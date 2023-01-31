<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Admin;
use App\Models\Books;
use App\Models\School;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Categorie;
use App\Models\ReadingChallange;
use App\Models\ReadingChecker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class SchoolController extends Controller
{
    //

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        // $this->middleware('guest:admin');
        // $this->middleware('guest:school');
    }
    public function students_delete($id)
    {
        $students= Student::find($id)->delete();

        ReadingChallange::where('student_id',$id)->delete();

        return redirect()->back();


        // $message        = "تم حذف طالب بنجاح";

        // $error_message = "";
        // return view('admin.students', compact('error_message', 'message', 'students'));

    }
    public function school_admin_delete(Request  $request, $id)
    {
        $students= Admin::find($id)->delete();
        $error_message  = "";
        $message        = "تم حذف مشرف بنجاح";
        $school_id      = $request->user()->id;
        $admins       = Admin::where(['school_id' => $school_id])->get(['*']);
        $school_id    =   auth()->user()->id;
        $classes  = Classes::where('school_id',$school_id)->get(['*']);
        return view('school.admins' ,compact('classes','error_message' , 'message' , 'admins'));

        // return redirect()->back();
        // // $message        = "تم حذف طالب بنجاح";

        // // $error_message = "";
        // // return view('admin.students', compact('error_message', 'message', 'students'));

    }



    public function home(Request $request)
    {
        $school_id      = $request->user()->id;
        $username       = $request->user()->username;
        $error_message  = "";
        $message        = "";
        $books          = Books::join('files', 'files.id', '=', 'books.file_id')
                                        ->join('categories', 'categories.id', '=', 'books.category')
                                        ->where(['school_id' => $school_id])
                                        ->get(['books.*', 'categories.name', 'files.file_name']);



        return view('school.index' ,compact('error_message' , 'message' , 'books' , 'username'));


    }

    // https://3dflipbook.net/simple-jquery-pdf
    public function book(Request $request, $bookID)
    {

        $error_message  = "";
        $message        = "";
        $books          = Books::join('files', 'files.id', '=', 'books.file_id')
                        ->where(['books.id' => $bookID])
                        ->get(['books.*', 'files.file_name'])
                        ->first();

        $file_name =  $books->file_name;
        return view('school.book' ,compact('error_message' , 'message' , 'books' , 'file_name'));
    }


    public function addBook(Request $request)
    {


        // phpinfo(INFO_CONFIGURATION);
        // return $request;
        $error_message  = "";
        $message        = "";
        $fileName       = "";
        $categories = Categorie::all(['*']);


        if ($request->isMethod('post')) {
            $ISBN=Books::where('ISBN',$request->ISBN)->first();

        
            if ($ISBN == null ) {
                // return 'new isbn';

                if ($request->ISBN == null) {
                    $ministerialNumber = $request->user()->ministerialNumber;
                    $ISBN=$ministerialNumber.''.'000000';

                } else {
                    $ISBN=$request->ISBN;
                }


                $rules = [
                    'file' => 'required|mimes:pdf|file|max:20000',
                    'title' => 'required',
                    'categories' => 'required',
                ];

                $messages = [
                    'file.required' => 'الرجاء اختيار ملف',
                    'title.required' => 'الرجاء كتابة عنوان الكتاب',
                    'categories.required' => 'الرجاء اختيار ملف',
                    'file.mimes' => 'نوع الملف خاطئ',
                    'file.max' => 'الرجاء رفع ملف أقل من 10 ميجابايت',
                ];

                $validator = FacadesValidator::make($request->all(), $rules, $messages);

                if ($validator->fails() == false) {

                    $temp_hash = hash_file('sha256', $request->file->getRealPath());
                    $fileDB = File::where(['hash' => $temp_hash])->first();
                    $school_id = $request->user()->id;
                    // look for file vis hash

                    if ($fileDB == null) {

                        $fileName = time() . '.' . $request->file->extension();
                        $request->file->storeAs('books', $fileName); // save in private path

                        $filepath = storage_path('app/books/' . $fileName);
                        $hash =  hash_file('sha256', $filepath);

                        $fileAdded = File::create([
                            'file_name' => $fileName,
                            'hash' => $hash,
                        ]);


                        $file_id = $fileAdded->id;

                        Books::create([
                            'school_id' =>  $school_id,
                            'file_id' =>  $file_id,
                            'title' => $request->title,
                            'category' => $request->categories,
                            'language' => $request->lang,

                            'author' => $request->author,
                            'page_number' => $request->page_number,
                            'ISBN' => $ISBN,
                            'Publishing_House' => $request->Publishing_House,
                            'copy' => $request->copy,
                            'challenge' => $request->challenge,


                        ]);

                        $message = "تم رفع الكتاب بنجاح";
                    } else {

                        $file_id = $fileDB->id;

                        Books::create([
                            'school_id' =>  $school_id,
                            'file_id' =>  $file_id,
                            'title' => $request->title,
                            'category' => $request->categories,
                            'language' => $request->lang,

                            'author' => $request->author,
                            'page_number' => $request->page_number,
                            'ISBN' => $ISBN,
                            'Publishing_House' => $request->Publishing_House,
                            'copy' => $request->copy,
                            'challenge' => $request->challenge,
                        ]);

                        $message = "تم رفع الكتاب بنجاح";
                    }
                } else {

                    $error = $validator->errors();
                    $allErrors = "";

                    foreach ($error->all() as $err) {
                        $allErrors .= $err . " <br/>";
                    }

                    $error_message = $allErrors;
                }




            } else {
                // return 'exit isbn';
                $rules = [
                    ];

                $messages = [
               ];

                $validator = FacadesValidator::make($request->all(), $rules, $messages);

                if ($validator->fails() == false) {


                    $school_id = $request->user()->id;
                    // look for file vis hash

                        Books::create([
                            'school_id' =>  $school_id,
                            'file_id' =>  $ISBN->file_id,
                            'title' => $ISBN->title,
                            'category' => $ISBN->category,
                            'language' => $ISBN->language,

                            'author' => $ISBN->author,
                            'page_number' => $ISBN->page_number,
                            'ISBN' => $ISBN->ISBN,
                            'Publishing_House' => $ISBN->Publishing_House,
                            'copy' => $request->copy,
                            'challenge' => $request->challenge,
                        ]);

                        $message = "تم رفع الكتاب و ردمك الكتاب موجود مسبقا";

                } else {

                    $error = $validator->errors();
                    $allErrors = "";

                    foreach ($error->all() as $err) {
                        $allErrors .= $err . " <br/>";
                    }

                    $error_message = $allErrors;
                }
            }


        }
        // $error_message  = "";
        // $message        = "";
        // $fileName       = "";
        // $categories = Categorie::all(['*']);

        // if ($request->isMethod('post'))
        // {
        //     $rules = ['file' => 'required|mimes:pdf|file|max:20000'];

        //     $messages = [
        //         'file.required' => 'الرجاء اختيار ملف',
        //         'title.required' => 'الرجاء كتابة عنوان الكتاب',
        //         'categories.required' => 'الرجاء اختيار ملف',
        //         'file.mimes' => 'نوع الملف خاطئ',
        //         'file.max' => 'الرجاء رفع ملف أقل من 10 ميجابايت',
        //     ];

        //     $validator = FacadesValidator::make($request->all() , $rules, $messages);

        //     if($validator->fails() == false)
        //     {

        //         $temp_hash = hash_file('sha256' , $request->file->getRealPath());
        //         $fileDB = File::where([ 'hash' => $temp_hash ])->first();
        //         $school_id = $request->user()->id;
        //         // look for file vis hash

        //         if ($fileDB == null) {

        //             $fileName = time().'.'.$request->file->extension();
        //             $request->file->storeAs('books', $fileName);// save in private path

        //             $filepath = storage_path('app/books/'.$fileName);
        //             $hash =  hash_file('sha256' , $filepath);

        //             $fileAdded = File::create([
        //                 'file_name' => $fileName,
        //                 'hash' => $hash,
        //             ]);

        //             $file_id = $fileAdded->id;

        //             Books::create([
        //                'school_id' =>  $school_id ,
        //                'file_id' =>  $file_id ,
        //                'title' => $request->title,
        //                'category' => $request->categories,
        //                'author' => $request->author,
        //                'page_number' => $request->page_number,
        //                'ISBN' => $request->ISBN,
        //                'Publishing_House' => $request->Publishing_House,
        //                'copy' => $request->copy,
        //                'challenge' => $request->challenge,
        //             ]);

        //             $message = "تم رفع الكتاب بنجاح";

        //         }else{

        //             $file_id = $fileDB->id;

        //             Books::create([
        //                 'school_id' =>  $school_id ,
        //                 'file_id' =>  $file_id ,
        //                 'title' => $request->title,
        //                 'category' => $request->categories,
        //                 'author' => $request->author,
        //                 'page_number' => $request->page_number,
        //                 'ISBN' => $request->ISBN,
        //                 'Publishing_House' => $request->Publishing_House,
        //                 'copy' => $request->copy,
        //                 'challenge' => $request->challenge,
        //              ]);

        //             $message = "تم رفع الكتاب بنجاح";

        //         }

        //     }else{

        //         $error = $validator->errors();
        //         $allErrors = "";

        //         foreach($error->all() as $err){
        //             $allErrors .= $err . " <br/>";
        //         }

        //         $error_message = $allErrors;

        //     }


        // }


        return view('school.addBook', compact('error_message' , 'message', 'categories' , 'fileName'));

    }
    public function bookone(Request $request, $bookID)
    {

        // return $bookID;

        $error_message  = "";
        $message        = "";
        $books          = Books::join('files', 'files.id', '=', 'books.file_id')
            ->where(['books.id' => $bookID])
            ->get(['books.*', 'files.file_name'])
            ->first();

        $file_name      =  $books->file_name;
        return view('school.book', compact('error_message', 'message', 'books', 'file_name'));
    }


    public function admins(Request $request)
    {
        $error_message  = "";
        $message        = "";
        $school_id      = $request->user()->id;
        // $admins       = Admin::with('ClassName')->find(3);
        $admins       = Admin::where(['school_id' => $school_id])->orderBy('id','desc')->get(['*']);

        // return $admins->class_name->name;
        $school_id    =   auth()->user()->id;
        $classes  = Classes::where('school_id',$school_id)->get(['*']);
        return view('school.admins' ,compact('classes','error_message' , 'message' , 'admins'));


    }


   public function addAdmin(Request $request)
    {
        $error_message  = "";
        $message        = "";
        $school_id      = $request->user()->id;

        if($request->isMethod("post"))
        {
            $rules = [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ];

            $messages = [
                'name.required' => 'الرجاء اختيار الاسم',
                'email.required' => 'الرجاء كتابة الإيميل',
                'password.required' => 'الرجاء كتابة كلمة المرور',
            ];

            $validator = FacadesValidator::make($request->all() , $rules, $messages);

            if($validator->fails() == false)
            {
                Admin::create([
                    'name' =>  $request->name ,
                    'email' =>  $request->email ,
                    // 'class' =>  $request->class ,
                    'password' => Hash::make($request->password),
                    'school_id' => $school_id,

                ]);

                $message = "تمت إضافة المشرف";

            }else{

                $error     = $validator->errors();
                $allErrors = "";

                foreach($error->all() as $err){
                    $allErrors .= $err . " <br/>";
                }

                $error_message = $allErrors;

            }
        }
        $school_id    =   auth()->user()->id;
        $classes  = Classes::where('school_id',$school_id)->get(['*']);
        return view('school.addAdmin' ,compact('classes','error_message' , 'message'));
    }
   public function updateAdmin($id)
    {
        $error_message  = "";
        $message        = "";
        $school_id    =   auth()->user()->id;
        $classes  = Classes::where('school_id',$school_id)->get(['*']);
        $Admin=Admin::find($id);

        return view('school.editadmin' ,compact('Admin','classes','error_message' , 'message'));
    }
   public function updatesAdmin(Request $request, $id)
    {
        $error_message  = "";
        $message        = "";
        $school_id      = $request->user()->id;

        if($request->isMethod("post"))
        {
            $rules = [
                'name' => 'required',
                'email' => 'required',
            ];

            $messages = [
                'name.required' => 'الرجاء اختيار الاسم',
                'email.required' => 'الرجاء كتابة الإيميل',
            ];

            $validator = FacadesValidator::make($request->all() , $rules, $messages);

            if($validator->fails() == false)
            {
                Admin::find($id)->update([
                    'name' =>  $request->name ,
                    'email' =>  $request->email ,
                    // 'class' =>  $request->class ,
                    'school_id' => $school_id,

                ]);

                $message = "تمت تعديل المشرف";

            }else{

                $error     = $validator->errors();
                $allErrors = "";

                foreach($error->all() as $err){
                    $allErrors .= $err . " <br/>";
                }

                $error_message = $allErrors;

            }
        }
        $admins       = Admin::where(['school_id' => $school_id])->get(['*']);
        $school_id    =   auth()->user()->id;
        $classes  = Classes::where('school_id',$school_id)->get(['*']);
        return view('school.admins' ,compact('classes','error_message' , 'message' , 'admins'));
    }

    public function students(Request $request)
    {
        $error_message  = "";
        $message        = "";
        $school_id      = $request->user()->id;
        $students       = Student::where(['school_id' => $school_id])
                        ->orderBy('id','desc')->get(['*']);

        return view('school.students' ,compact('error_message' , 'message' , 'students'));
    }

    public function addStudent(Request $request)
    {

        $error_message  = "";
        $message        = "";
        $school_id = $request->user()->id;

        if ($request->isMethod('post'))
        {
            $rules = [
                'name' => 'required',
                'id_number' => 'required',
                'password' => 'required',
            ];

            $messages = [
                'name.required' => 'الرجاء اختيار الاسم',
                'id_number.required' => 'الرجاء كتابة رقم الهوية',
                'password.required' => 'الرجاء كتابة كلمة المرور',
            ];

            $validator = FacadesValidator::make($request->all() , $rules, $messages);

            if($validator->fails() == false)
            {
                // Student::create([
                //     'name' =>  $request->name ,
                //     'id_number' =>  $request->id_number ,
                //     'password' => Hash::make($request->password),
                //     'class' => $request->class,
                //     'school_id' => $school_id
                // ]);
                try {
                    $admin_id=Classes::where('id',$request->class)->first();
                    $admin_id=$admin_id->admin_id;


                } catch (\Throwable $th) {
                    $admin_id=null;
                }

                // if ($admin_id) {
                //     $admin_id=$admin_id->id;
                // }else{
                //     $admin_id=null;
                // }

                Student::create([
                    'name' =>  $request->name,
                    'id_number' =>  $request->id_number,
                    'password' => Hash::make($request->password),
                    'class' => $request->class,
                    'school_id' => $school_id,
                    'admin' => $admin_id,
                ]);

                $message = "تمت إضافة الطالب";

            }else{

                $error     = $validator->errors();
                $allErrors = "";

                foreach($error->all() as $err){
                    $allErrors .= $err . " <br/>";
                }

                $error_message = $allErrors;

            }

        }
        $school_id    =   auth()->user()->id;
        $classes  = Classes::where('school_id',$school_id)->get(['*']);
        $Schools  = School::get(['*']);
        return view('school.addStudent' ,compact('error_message', 'message', 'classes','Schools'));

    }
    public function school_student_edit($id)
    {       $school_id    =   auth()->user()->id;
        $classes  = Classes::where('school_id',$school_id)->get(['*']);
        $students= Student::find($id);

        // return $id;
        return view('school.edit_student',compact('students','classes'));
    }
    public function school_student_update(Request $request, $id)
    {
        // return $request;
        $school_id    =   auth()->user()->id;
        $classes  = Classes::where('school_id',$school_id)->get(['*']);
        // $admin_id=Admin::where('class',$request->class)->first();

        // try {
        //     $admin_id=Admin::where('class',$request->class)->first();


        //     $admin_id=$admin_id->id;
        // } catch (\Throwable $th) {
        //     $admin_id=null;
        // }

        // if ($admin_id) {
        //     $admin_id=$admin_id->id;
        // }else{
        //     $admin_id=null;
        // }
        // return $admin_id;

        $admin_id=Classes::where('id',$request->class)->first();
        $admin_id=$admin_id->admin_id;
        // } catch (\Throwable $th) {
        //     $admin_id=null;
        // }
        $students= Student::find($id)->update([
            'name' =>  $request->name,
            'id_number' =>  $request->id_number,
            //  'admin' => $admin_id,
             'class' => $request->class,

        ]);
        $message = "تمت إضافة الطالب";
        $error_message="";
        $students= Student::find($id);
        return view('school.edit_student', compact('error_message', 'message','students', 'classes'));

        return redirect()->back();
    }
    public function sendWhatsApp(Request $request)
    {

        $error_message  = "";
        $message        = "";

        if($request->isMethod("post")){

            $phone   = $request->phone;
            $name    = $request->name;
            $message = $request->message;

            // if(str_contains($phone , '966') == false){
            //     $phone = '966'.$phone;
            // }

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ultramsg.com/instance7127/messages/chat",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "token=99ykihep47g23ufs&to=$phone&body=$message&priority=10&referenceId=",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                //echo "cURL Error #:" . $err;
                $error_message = "حدث خطا غير متوقع, لم يتم إرسال الرسالة بنجاح";
            } else {
                //echo $response;
                $message        = "تم إرسال الرسالة بنجاح";
            }

        }

        return view('school.whatsapp' ,compact('error_message' , 'message'));

    }

    public function logout(Request $request)
    {
        Auth::guard('school')->logout();
        return redirect('/');
    }

    public function editbook(Request $request ,$id)
    {


        // phpinfo(INFO_CONFIGURATION);
        // return;


        $error_message  = "";
        $message        = "";
        $fileName       = "";
        $categories = Categorie::all(['*']);
        $book=Books::find($id);



        return view('school.editBook', compact('error_message', 'message', 'categories', 'book','fileName'));
    }
    public function updatebook(Request $request ,$id)
    {


        // phpinfo(INFO_CONFIGURATION);

        $error_message  = "";
        $message        = "";
        $fileName       = "";
        $categories = Categorie::all(['*']);


        if ($request->isMethod('post')) {
            $ISBN=Books::where('ISBN',$request->ISBN)->first();

            if ($ISBN == null) {
                $rules = [
                    'file' => 'required|mimes:pdf|file|max:20000',
                    'title' => 'required',
                    'categories' => 'required',
                ];

                $messages = [
                    'file.required' => 'الرجاء اختيار ملف',
                    'title.required' => 'الرجاء كتابة عنوان الكتاب',
                    'categories.required' => 'الرجاء اختيار ملف',
                    'file.mimes' => 'نوع الملف خاطئ',
                    'file.max' => 'الرجاء رفع ملف أقل من 10 ميجابايت',
                ];

                $validator = FacadesValidator::make($request->all(), $rules, $messages);

                if ($validator->fails() == false) {

                    $temp_hash = hash_file('sha256', $request->file->getRealPath());
                    $fileDB = File::where(['hash' => $temp_hash])->first();
                    $school_id = $request->user()->school_id;
                    // look for file vis hash

                    if ($fileDB == null) {

                        $fileName = time() . '.' . $request->file->extension();
                        $request->file->storeAs('books', $fileName); // save in private path

                        $filepath = storage_path('app/books/' . $fileName);
                        $hash =  hash_file('sha256', $filepath);

                        $fileAdded = File::create([
                            'file_name' => $fileName,
                            'hash' => $hash,
                        ]);


                        $file_id = $fileAdded->id;

                        Books::create([
                            'school_id' =>  $school_id,
                            'file_id' =>  $file_id,
                            'title' => $request->title,
                            'category' => $request->categories,
                            'language' => $request->lang,

                            'author' => $request->author,
                            'page_number' => $request->page_number,
                            'ISBN' => $request->ISBN,
                            'Publishing_House' => $request->Publishing_House,
                            'copy' => $request->copy,
                            'challenge' => $request->challenge,


                        ]);

                        $message = "تم رفع الكتاب بنجاح";
                    } else {

                        $file_id = $fileDB->id;

                        Books::create([
                            'school_id' =>  $school_id,
                            'file_id' =>  $file_id,
                            'title' => $request->title,
                            'category' => $request->categories,
                            'language' => $request->lang,

                            'author' => $request->author,
                            'page_number' => $request->page_number,
                            'ISBN' => $request->ISBN,
                            'Publishing_House' => $request->Publishing_House,
                            'copy' => $request->copy,
                            'challenge' => $request->challenge,
                        ]);

                        $message = "تم رفع الكتاب بنجاح";
                    }
                } else {

                    $error = $validator->errors();
                    $allErrors = "";

                    foreach ($error->all() as $err) {
                        $allErrors .= $err . " <br/>";
                    }

                    $error_message = $allErrors;
                }
            } else {

                $rules = [
                    ];

                $messages = [
               ];

                $validator = FacadesValidator::make($request->all(), $rules, $messages);

                if ($validator->fails() == false) {


                    $school_id = $request->user()->school_id;
                    // look for file vis hash




                        Books::create([
                            'school_id' =>  $school_id,
                            'file_id' =>  $ISBN->file_id,
                            'title' => $request->title,
                            'category' => $request->categories,
                            'language' => $request->lang,

                            'author' => $request->author,
                            'page_number' => $request->page_number,
                            'ISBN' => $request->ISBN,
                            'Publishing_House' => $request->Publishing_House,
                            'copy' => $request->copy,
                            'challenge' => $request->challenge,
                        ]);

                        $message = "تم رفع الكتاب و ردمك الكتاب موجود مسبقا";

                } else {

                    $error = $validator->errors();
                    $allErrors = "";

                    foreach ($error->all() as $err) {
                        $allErrors .= $err . " <br/>";
                    }

                    $error_message = $allErrors;
                }
            }


        }



        return view('school.editBook', compact('error_message', 'message', 'categories', 'book','fileName'));
    }

    public function deletebook( $bookID)
    {

        $school_id      = auth('admin')->user()->id;
        $username       = auth('admin')->user()->username;
        $school_id      = auth()->user()->id;
        $error_message  = "";
        $message        = "تم حذف كتاب بنجاح";
        Books::find($bookID)->delete();


        $books          = Books::join('files', 'files.id', '=', 'books.file_id')
                                        ->join('categories', 'categories.id', '=', 'books.category')
                                        ->where(['school_id' => $school_id])
                                        ->get(['books.*', 'categories.name', 'files.file_name']);



        return view('school.index' ,compact('error_message' , 'message' , 'books' , 'username'));
    }
}
