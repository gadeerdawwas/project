<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\File;
use App\Models\Live;
use App\Models\Admin;
use App\Models\Books;
use App\Models\School;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Teachers;
use App\Models\Categorie;
use App\Imports\UsersImport;
use App\Models\Appointments;
use Facade\FlareClient\View;

use Illuminate\Http\Request;
use App\Models\AudioRecoreds;
use Laravel\Ui\Presets\React;
use App\Models\ReadingChecker;
use App\Models\ReadingChallange;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ReadingCheckerSubmits;

use Illuminate\Support\Facades\Storage;

use Google\Cloud\Speech\V1\SpeechClient;
use Google\Cloud\Speech\V1\RecognitionAudio;
use Google\Cloud\Speech\V1\RecognitionConfig;
use Google\Cloud\Speech\V1\StreamingRecognitionConfig;
use Google\Cloud\Speech\V1\RecognitionConfig\AudioEncoding;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        ini_set('post_max_size', '20M');
    }

    public function home(Request $request)
    {
        $school_id      = $request->user()->school_id;
        $error_message  = "";
        $message        = "";
        $books          = Books::join('files', 'files.id', '=', 'books.file_id')
            ->join('categories', 'categories.id', '=', 'books.category')
            ->where(['school_id' => $school_id])
            ->get(['books.*', 'categories.name', 'files.file_name']);


        return view('admin.index', compact('error_message', 'message', 'books'));
    }

    // https://3dflipbook.net/simple-jquery-pdf
    public function book(Request $request, $bookID)
    {

        // return $bookID;

        $error_message  = "";
        $message        = "";
        $books          = Books::join('files', 'files.id', '=', 'books.file_id')
            ->where(['books.id' => $bookID])
            ->get(['books.*', 'files.file_name'])
            ->first();

        $file_name      =  $books->file_name;
        return view('admin.book', compact('error_message', 'message', 'books', 'file_name'));
    }
    public function deletebook( $bookID)
    {
        Books::find($bookID)->delete();
        $school_id      = auth('admin')->user()->school_id;
        $error_message  = "";
        $message        = "تم حذف كتاب بنجاح";
        $books          = Books::join('files', 'files.id', '=', 'books.file_id')
            ->join('categories', 'categories.id', '=', 'books.category')
            ->where(['school_id' => $school_id])
            ->get(['books.*', 'categories.name', 'files.file_name']);

        return view('admin.index', compact('error_message', 'message', 'books'));
    }

    public function addBook(Request $request)
    {


        // phpinfo(INFO_CONFIGURATION);
        // return;

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


                    $school_id = $request->user()->school_id;
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


        return view('admin.addBook', compact('error_message', 'message', 'categories', 'fileName'));
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



        return view('admin.editBook', compact('error_message', 'message', 'categories', 'book','fileName'));
    }
    public function updatebook(Request $request ,$id)
    {


        // phpinfo(INFO_CONFIGURATION);
        // return;
        // return $request;

        $error_message  = "";
        $message        = "";
        $fileName       = "";
        $categories = Categorie::all(['*']);
        $book=Books::find($id);
        if ($request->isMethod('post')) {
            $rules = [
                // 'file' => 'required|mimes:pdf|file|max:20000',
                'title' => 'required',
                'categories' => 'required',
            ];

            $messages = [
                'file.required' => 'الرجاء اختيار ملف',
                'title.required' => 'الرجاء كتابة عنوان الكتاب',
                'categories.required' => 'الرجاء اختيار ملف',
                // 'file.mimes' => 'نوع الملف خاطئ',
                // 'file.max' => 'الرجاء رفع ملف أقل من 10 ميجابايت',
            ];

            $validator = FacadesValidator::make($request->all(), $rules, $messages);

            if ($validator->fails() == false) {

                $school_id = $request->user()->school_id;


                    Books::find($id)->update([
                        'school_id' =>  $school_id,
                        // 'file_id' =>  $file_id,
                        'title' => $request->title,
                        'category' => $request->categories,
                        'language' => $request->language,
                        'author' => $request->author,
                        'page_number' => $request->page_number,
                        'ISBN' => $request->ISBN,
                        'Publishing_House' => $request->Publishing_House,
                        'copy' => $request->copy,
                        'challenge' => $request->challenge,


                    ]);

                    // return Books::find($id);
                    $message = "تم تعديل الكتاب بنجاح";

            } else {

                $error = $validator->errors();
                $allErrors = "";

                foreach ($error->all() as $err) {
                    $allErrors .= $err . " <br/>";
                }

                $error_message = $allErrors;
            }
        }


        return view('admin.editBook', compact('error_message', 'message', 'categories', 'book','fileName'));
    }

    public function students(Request $request)
    {
        $error_message  = "";
        $message        = "";
        $school_id      = $request->user()->school_id;
        // $students       = Student::where(['school_id' => $school_id])->get(['*']);
        $students       = Student::where(['school_id' => $school_id])->orderBy('id','desc')->get(['*']);
        // $students       = Student::find(5);
        // return $students->ClassName->Admin;

        return view('admin.students', compact('error_message', 'message', 'students'));
    }

    public function addStudent(Request $request)
    {
        // return $request;
        $error_message  = "";
        $message        = "";
        $school_id = $request->user()->school_id;

        if ($request->isMethod('post')) {
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

            $validator = FacadesValidator::make($request->all(), $rules, $messages);

            if ($validator->fails() == false) {
                // try {
                    // $admin_id=Admin::where('class',$request->class)->first();

                // return $admin_id;
                //     $admin_id=$admin_id->id;
                // } catch (\Throwable $th) {
                //     $admin_id=null;
                // }

                // if ($admin_id) {
                //     $admin_id=$admin_id->id;
                // }else{
                //     $admin_id=null;
                // }
                $classroom=Classes::find($request->class);
                // return $classroom->classroom;
                Student::create([
                    'name' =>  $request->name,
                    'id_number' =>  $request->id_number,
                    'password' => Hash::make($request->password),
                    'class' => $request->class,
                    'classroom' => $classroom->classroom,
                    'school_id' => $school_id,
                    // 'admin' => $admin_id,
                ]);

                $message = "تمت إضافة الطالب";
            } else {

                $error     = $validator->errors();
                $allErrors = "";

                foreach ($error->all() as $err) {
                    $allErrors .= $err . " <br/>";
                }

                $error_message = $allErrors;
            }
        }
        $school_id    =   auth('admin')->user()->school_id;
        $classes  = Classes::where('school_id',$school_id)->get(['*']);
        // $classes  = Classes::get(['*']);
        $Schools  = School::get(['*']);
        // return $classes;

        return view('admin.addStudent', compact('error_message', 'message', 'classes','Schools'));
    }

    public function importStudents(Request $request)
    {

        $message = "";
        if ($request->isMethod("post")) {
             Excel::import(new UsersImport, request()->file('file'));
            $message = "اكتملت الاضافة";
        }

        return view('admin.importStudents', compact('message'));
    }

    public function student_edit($id)
    {    $school_id    =   auth('admin')->user()->school_id;
        $classes  = Classes::where('school_id',$school_id)->get(['*']);
        $students= Student::find($id);
        return view('admin.edit_student',compact('students','classes'));
    }
    public function student_update(Request $request, $id)
    {
        $school_id    =   auth('admin')->user()->school_id;
        $classes  = Classes::where('school_id',$school_id)->get(['*']);
        // $admin_id=Admin::where('class',$request->class)->first();

        // try {
        //     $admin_id=Admin::where('class',$request->class)->first();


        //     $admin_id=$admin_id->id;
        // } catch (\Throwable $th) {
        //     $admin_id=null;
        // }

        $students= Student::find($id)->update([
            'name' =>  $request->name,
            'id_number' =>  $request->id_number,
            //  'admin' => $admin_id,
            'class' => $request->class
        ]);
        $message = "تمت إضافة الطالب";
        $error_message="";
        $students= Student::find($id);
        return view('admin.edit_student', compact('error_message', 'message','students', 'classes'));

        return redirect()->back();
    }
    public function students_delete($id)
    {
        $error_message  = "";
        $message        = "تم حذف طالب بنجاح";
        $school_id      =  auth('admin')->user()->school_id;
        $students= Student::find($id)->delete();
        $students       = Student::where(['school_id' => $school_id])->get(['*']);
        ReadingChallange::where('student_id',$id)->delete();

        // return redirect()->back();

        // $error_message = "";
        return view('admin.students', compact('error_message', 'message', 'students'));

    }




    public function podcasts(Request $request)
    {

        $school_id      = $request->user()->school_id;

        $podcasts = AudioRecoreds::join('students', 'students.id', '=', 'audiorecoreds.student_id')
            ->join('books', 'books.id', '=', 'audiorecoreds.book_id')
            ->join('files', 'files.id', '=', 'audiorecoreds.file_id')
            ->where(['audiorecoreds.school_id' => $school_id, 'approved' => 0])
            ->get(['audiorecoreds.id AS podcast_id', 'students.name AS student_name', 'books.title AS book_name', 'files.file_name']);


        return view('admin.podcast', compact('podcasts'));
    }

    public function approvedPodcasts(Request $request)
    {

        $school_id      = $request->user()->school_id;

        $podcasts = AudioRecoreds::join('students', 'students.id', '=', 'audiorecoreds.student_id')
            ->join('books', 'books.id', '=', 'audiorecoreds.book_id')
            ->join('files', 'files.id', '=', 'audiorecoreds.file_id')
            ->where(['audiorecoreds.school_id' => $school_id, 'audiorecoreds.approved' => 1])
            ->get(['students.name AS student_name', 'books.title AS book_name', 'files.file_name']);


        return view('admin.approvedPodcasts', compact('podcasts'));
    }

    public function changePodcastStatus(Request $request)
    {
        if ($request->isMethod('post')) {

            $approved       = $request->approved;
            $audioRecordId  = $request->podcast_id;

            AudioRecoreds::where(['id' => $audioRecordId])->update(['approved' => $approved]);

            print('done');
        }
    }

    public function live(Request $request)
    {

        $school_id      = $request->user()->school_id;
        $message        = '';

        if ($request->isMethod('post')) {
            $url    = $request->url;
            $active = $request->active;

            Live::where(['school_id' => $school_id])->update(['url' => $url, 'active' => $active]);
        }

        $live     = Live::where(['school_id' => $school_id])->get(['*']);
        $url      = '';
        $active   = 0;

        if ($live->count() == 1) {
            $url = $live[0]->url;
            $active = $live[0]->active;
        }

        return view('admin.live', compact('url', 'active'));
    }

    public function teachers(Request $request)
    {
        $error_message  = "";
        $message        = "";
        $school_id      = $request->user()->school_id;
        $teachers       = Teachers::where(['school_id' => $school_id])->get(['*']);
        return view('admin.teachers', compact('teachers','error_message','message'));
    }
    public function editTeacher($id)
    {
        $error_message  = "";
        $message        = "";
        $teachers       = Teachers::find($id);
        return view('admin.editTeacher', compact('teachers','error_message','message'));
    }
    public function deleteTeacher($id)
    {
        $error_message  = "";
        $message        = "تم حذف معلم بنجاح";
        $teachers       = Teachers::find($id)->delete();

        $school_id      =  auth('admin')->user()->school_id;
        $teachers       = Teachers::where(['school_id' => $school_id])->get(['*']);
        // return redirect()->back()->with('error_message','message');
        return view('admin.teachers', compact('teachers','error_message','message'));
    }


    public function addTeacher(Request $request)
    {

        $error_message  = "";
        $message        = "";
        $school_id      = $request->user()->school_id;

        if ($request->isMethod("post")) {
            $rules = [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ];

            $messages = [
                'name.required' => 'الرجاء اختيار الاسم',
                'email.required' => 'الرجاء كتابة البريد الالكتروني',
                'password.required' => 'الرجاء كتابة كلمة المرور',
            ];

            $validator = FacadesValidator::make($request->all(), $rules, $messages);

            if ($validator->fails() == false) {
                Teachers::create([
                    'name' =>  $request->name,
                    'email' =>  $request->email,
                    'password' => Hash::make($request->password),
                    'school_id' => $school_id
                ]);

                $message = "تمت إضافة المعلم";
            } else {

                $error     = $validator->errors();
                $allErrors = "";

                foreach ($error->all() as $err) {
                    $allErrors .= $err . " <br/>";
                }

                $error_message = $allErrors;
            }
        }

        return view('admin.addTeacher', compact('message', 'error_message'));
    }
    public function updateTeacher(Request $request,$id)
    {

        $error_message  = "";
        $message        = "تم تعديل المعلم بنجاح";
        // $school_id      = $request->user()->school_id;

        Teachers::find($id)->update([
            'name' =>  $request->name,
            'email' =>  $request->email,

        ]);

        $teachers       = Teachers::find($id);

        return view('admin.editTeacher', compact('teachers','error_message','message'));

    }

    public function appointments(Request $request)
    {

        $school_id      = $request->user()->school_id;
        $next_week      = date('Y-m-d', time() + 60 * 60 * 24 * 7);
        $this_week      = date('Y-m-d');

        $appointments    = Appointments::where(['appointments.school_id' => $school_id])
            ->whereBetween('date', ["'$this_week'", "'$next_week'"], 'and', true)
            ->join('teachers', 'teachers.id', '=', 'appointments.teatcher_id')
            ->get(['appointments.*', 'teachers.name']);

        // $appointments = DB::table('appointments')
        // ->where('school_id' , $school_id)
        // ->whereBetween('date' , [ "'$this_week'" , "'$next_week'"] , 'and' , true)
        // ->get(['*']);

        //var_dump($appointments[0]['name']);
        return view('admin.appointments', compact('appointments', 'this_week', 'next_week'));
    }

    public function readChallange(Request $request)
    {

        $school_id      = $request->user()->school_id;
        /*
            'reading_challange.id AS id',
            'students.name AS student_name',
            'schools.name AS school_name',
            'reading_challange.superviser_name AS superviser_name',
            'reading_challange.title AS title',
            'reading_challange.writer_name AS writer_name',
            'reading_challange.publishing_house AS publishing_house',
            'reading_challange.pages AS pages',
            'reading_challange.summary AS summary',
            'reading_challange.complete_date AS complete_date'
        */
        // reading_challange.*, reading_challange.student_id AS userID ,
        $requests = DB::table('students')
            // ->selectRaw("students.* , students.id AS student_id , COUNT(reading_challange.id) AS total, classes.name AS class_name")
            // ->join('classes', 'classes.id', '=', 'students.class')
            // ->join('reading_challange', 'students.id', '=', 'reading_challange.student_id')
            //->join('schools', 'schools.id', '=', 'reading_challange.school_id')
            // ->where(['reading_challange.school_id' => $school_id])
            // ->groupBy('reading_challange.student_id')
            ->get();

        //$requests = DB::statement("select reading_challange.* , students.* , COUNT(reading_challange.id) AS total  from reading_challange join students on students.id = reading_challange.student_id join schools on schools.id = reading_challange.school_id where (reading_challange.school_id = $school_id) group by students.id ");
        $school_id    =   auth('admin')->user()->school_id;
        $student_id=Student::where('school_id',$school_id)->pluck('id');
        // $ReadingChallange=ReadingChallange::where('school_id',$school_id)->orderBy('id','desc')->paginate(10);
        $ReadingChallange=ReadingChallange::where('school_id',$school_id) ->select('student_id', DB::raw('count(*) as total'))
        ->groupBy('student_id')->orderBy('id','desc')->paginate(10);
        // return $ReadingChallange;

        return view('admin.readChallange', compact('ReadingChallange'));
    }
    public function readChallange_show($id)
    {
        $ReadingChallange=ReadingChallange::find($id);
        return view('admin.readChallange_show', compact('ReadingChallange'));
    }
    public function readChallange_edit($id)
    {
        $ReadingChallange=ReadingChallange::find($id);
        return view('admin.readChallange_update', compact('ReadingChallange'));
    }
    public function readChallange_update(Request $request , $id)
    {
        // return $request;
        $ReadingChallange=ReadingChallange::find($id)->update(
        [
            'state' => $request->state
        ]
        );

        // return view('admin.addReadingChecker', compact('school_id', 'error_message', 'message'));

        return redirect()->back();
    }

    public function studentSubmits(Request $request, $student_id)
    {

        $requests = DB::table('students')
            ->selectRaw("students.* , students.id AS student_id, reading_challange.* , classes.name AS class_name")
            ->join('classes', 'classes.id', '=', 'students.class')
            ->join('reading_challange', 'students.id', '=', 'reading_challange.student_id')
            ->join('schools', 'schools.id', '=', 'reading_challange.school_id')
            ->where(['reading_challange.student_id' => $student_id])
            ->get();

        return view('admin.studentsSubmits', compact('requests'));
    }

    public function submitDetails(Request $request, $id)
    {

        $school_id  = $request->user()->school_id;

        $details = ReadingChallange::join('students', 'students.id', '=', 'reading_challange.student_id')
            ->join('schools', 'schools.id', '=', 'reading_challange.school_id')
            ->where(['reading_challange.school_id' => $school_id, 'reading_challange.id' => $id])
            ->get([
                'students.name AS student_name',
                'schools.name AS school_name',
                'reading_challange.created_at',
                'reading_challange.superviser_name AS superviser_name',
                'reading_challange.title AS title',
                'reading_challange.writer_name AS writer_name',
                'reading_challange.publishing_house AS publishing_house',
                'reading_challange.pages AS pages',
                'reading_challange.summary AS summary',
                'reading_challange.complete_date AS complete_date'
            ])[0];

        return view('admin.submitDetails', compact('details'));
    }

    public function readingBodyToPDF(Request $request, $id)
    {

        $school_id  = $request->user()->school_id;

        $details = ReadingChallange::join('students', 'students.id', '=', 'reading_challange.student_id')
            ->join('schools', 'schools.id', '=', 'reading_challange.school_id')
            ->where(['reading_challange.school_id' => $school_id, 'reading_challange.id' => $id])
            ->get([
                'students.name AS student_name',
                'schools.name AS school_name',
                'reading_challange.created_at',
                'reading_challange.superviser_name AS superviser_name',
                'reading_challange.title AS title',
                'reading_challange.writer_name AS writer_name',
                'reading_challange.publishing_house AS publishing_house',
                'reading_challange.pages AS pages',
                'reading_challange.summary AS summary',
                'reading_challange.complete_date AS complete_date'
            ])[0];


        //PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('admin.submitDetails', compact('details'))
            ->setOptions(['dpi' => 150]);;

        return $pdf->stream(); // download('page.pdf');
    }

    public function readChallangeDetails(Request $request, $post)
    {

        $school_id   = $request->user()->school_id;

        $requests = ReadingChallange::join('students', 'students.id', '=', 'reading_challange.student_id')
            ->join('schools', 'schools.id', '=', 'reading_challange.school_id')
            ->where(['reading_challange.school_id' => $school_id, 'reading_challange.id' => $post])
            ->get([
                'students.name AS student_name',
                'schools.name AS school_name',
                'reading_challange.created_at',
                'reading_challange.superviser_name AS superviser_name',
                'reading_challange.title AS title',
                'reading_challange.writer_name AS writer_name',
                'reading_challange.publishing_house AS publishing_house',
                'reading_challange.pages AS pages',
                'reading_challange.summary AS summary',
                'reading_challange.complete_date AS complete_date'
            ]);

        $superviser_name = $request->user()->name;
        $request = $requests[0];
        return view('admin.readChallangeDetails', compact('request', 'superviser_name'));
    }

    public function readingSubmits(Request $request)
    {
        $submits = ReadingCheckerSubmits::where(['school_id' => $request->user()->school_id])->get();

        return view('admin.readingSubmits', compact('submits'));
    }

    public function audioToText(Request $request)
    {
        // You can call the function as you like
        if (!function_exists('mb_str_word_count')) {
            function mb_str_word_count($string, $format = 0, $charlist = '[]')
            {
                mb_internal_encoding('UTF-8');
                mb_regex_encoding('UTF-8');

                $words = mb_split('[^\x{0600}-\x{06FF}]', $string);
                switch ($format) {
                    case 0:
                        return count($words);
                        break;
                    case 1:
                    case 2:
                        return $words;
                        break;
                    default:
                        return $words;
                        break;
                }
            };
        }

        $correctedText = '';
        $totalSeconds  = 0;

        if ($request->has('id')) {

            $submit = ReadingCheckerSubmits::join('files', 'files.id', '=', 'reading_checker_submits.file_id')
                ->join('reading_checker', 'reading_checker.id', '=', 'reading_checker_submits.checker_id')
                ->where(['reading_checker_submits.id' => $request->id])->first(['reading_checker_submits.*', 'files.file_name', 'reading_checker.body AS sentence']);

            if ($request->isMethod("post")) {
                //$audioResource = Storage::disk('public')->get(storage_path('public/test.flac'));
                $recognitionConfig = new RecognitionConfig();
                $recognitionConfig->setEncoding(AudioEncoding::FLAC); // FLAC
                $recognitionConfig->setSampleRateHertz(44100);
                $recognitionConfig->setLanguageCode('ar-SA');
                $config = new StreamingRecognitionConfig();
                $config->setConfig($recognitionConfig);

                $speechClient = new SpeechClient();

                //$audioResource = fopen('C:/wamp64/www/sites/library/storage/public/test.flac', 'r');
                //$audioResource = Storage::disk('public')->get('test.flac');
                $audioResource = Storage::disk('local')->get('audio/' . $submit->file_name);

                // $audioResource = Storage::disk('public')->get(storage_path('public/test.flac'));


                $responses = $speechClient->recognizeAudioStream($config, $audioResource);
                // $responses = $speechClient->recognize($config, $audioResource);

                foreach ($responses as $element) {
                    // doSomethingWith($element);
                    $results = $element->getResults();
                    //print($result[0]->getAlternatives()[0]->getTranscript());
                    // print("<br/>Time: ".$results[0]->getResultEndTime()->getSeconds());

                    foreach ($results as $result) {

                        $alternatives = $result->getAlternatives();

                        foreach ($alternatives as $alternative) {
                            $correctedText .= $alternative->getTranscript();
                        }

                        $totalSeconds += $result->getResultEndTime()->getSeconds();

                        // $times = $result->getResultEndTime();

                        // foreach($times as $time){
                        //     $totalSeconds += $time->getSeconds();
                        // }

                    }
                }


                // do math

                $sentence         = $submit->sentence; // this is orginal sentance
                $total_word_count = sizeof(explode(" ", $sentence)); // mb_str_word_count($sentence);// str_word_count($sentence);
                $user_word_count  = sizeof(explode(" ", $correctedText));

                $total_correct_words = $this->process_words( $sentence , $correctedText );

                $percentage = ($total_correct_words/$user_word_count) * 100;

                $readingSubmit = ReadingCheckerSubmits::find($request->id);
                $readingSubmit->processed_text          = $correctedText;
                $readingSubmit->total_processed_words   = $total_word_count;
                $readingSubmit->correct_words           = $total_correct_words;
                $readingSubmit->total_time_seconds      = $totalSeconds;
                $readingSubmit->percentage              = round($percentage , 2);

                $readingSubmit->update();

                //$resultData = $this->diff($sentence , $correctedText);

            }

            $submit = ReadingCheckerSubmits::join('files', 'files.id', '=', 'reading_checker_submits.file_id')
            ->join('reading_checker', 'reading_checker.id', '=', 'reading_checker_submits.checker_id')
            ->where(['reading_checker_submits.id' => $request->id])->first(['reading_checker_submits.*', 'files.file_name', 'reading_checker.body AS sentence']);

            return view('admin.audioToText', compact('correctedText', 'submit'));

        } else {

            return redirect('/admin/readingSubmits');

        }
    }

    public function checkerResults(Request $request)
    {

        return view('admin.checkerResults');
    }

    public function postedChecker(Request $request)
    {
        $school_id      = $request->user()->school_id;
        $checkers       = ReadingChecker::where(['school_id' => $school_id])
            ->withTrashed() // onlyTrashed() is alias of withTrashed()
            ->get(['*']);

        return view('admin.postedChecker', compact('school_id', 'checkers'));
    }

    /*
    *  @param Request $request
    *  @description: This function is used to create a new checker
    */
    public function addReadingChecker(Request $request)
    {
        $school_id = $request->user()->school_id;
        $my_id = $request->user()->id;
        $error_message  = "";
        $message        = "";

        if ($request->isMethod("post")) {

            $checker = new ReadingChecker;
            $checker->school_id = $school_id;
            $checker->admin_id = $my_id;
            $checker->title = $request->title;
            $checker->body = $request->body;
            $checker->save();

            $message = "تمت الاضافة بنجاح";

            unset($_POST);
        }

        return view('admin.addReadingChecker', compact('school_id', 'error_message', 'message'));
    }

    public function deleteReadingChecker($id)
    {
        ReadingChecker::find($id)->delete();

        //ReadingChecker::withTrashed()->find($id)->restore();
        return redirect()->back();
    }

    private function process_words($sourece , $distance)
    {
        $sourece_arr   = explode(" ", $sourece);
        $distance_arr  = explode(" ", $distance);

        $source_count = sizeof($sourece_arr);
        $distance_count = sizeof($distance_arr);

        $total_correct = 0;

        foreach($sourece_arr as $item){

            if(in_array($item , $distance_arr , TRUE)){
                $total_correct = $total_correct + 1;
            }

        }

        return $total_correct;

    }

    private function diff($old, $new)
    {
        $matrix = array();
        $maxlen = 0;
        foreach ($old as $oindex => $ovalue) {
            $nkeys = array_keys($new, $ovalue);
            foreach ($nkeys as $nindex) {
                $matrix[$oindex][$nindex] = isset($matrix[$oindex - 1][$nindex - 1]) ?
                    $matrix[$oindex - 1][$nindex - 1] + 1 : 1;
                if ($matrix[$oindex][$nindex] > $maxlen) {
                    $maxlen = $matrix[$oindex][$nindex];
                    $omax = $oindex + 1 - $maxlen;
                    $nmax = $nindex + 1 - $maxlen;
                }
            }
        }
        if ($maxlen == 0) return array(array('d' => $old, 'i' => $new));
        return array_merge(
            diff(array_slice($old, 0, $omax), array_slice($new, 0, $nmax)),
            array_slice($new, $nmax, $maxlen),
            diff(array_slice($old, $omax + $maxlen), array_slice($new, $nmax + $maxlen))
        );
    }



    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }



    public function readChallange_user( $id)
    {
        // return $id;
        // $school_id  = $request->user()->school_id;
        $challenge = ReadingChallange::where('state', 1)->where('student_id',$id)->count();
        $challenge_1 = ReadingChallange::where('student_id',$id)->where('state', 1)->skip(0)->take(10)->get();


        $challenge_2 = ReadingChallange::where('student_id',$id)->where('state', 1)->skip(10)->take(10)->get();
        $challenge_3 = ReadingChallange::where('student_id',$id)->where('state', 1)->skip(20)->take(10)->get();
        $challenge_4 = ReadingChallange::where('student_id',$id)->where('state', 1)->skip(30)->take(10)->get();
        $challenge_5 = ReadingChallange::where('student_id',$id)->where('state', 1)->skip(40)->take(10)->get();

        $challenge_1_count = $challenge_1->count();
        $challenge_2_count = $challenge_2->count();
        $challenge_3_count = $challenge_3->count();
        $challenge_4_count = $challenge_4->count();
        $challenge_5_count = $challenge_5->count();

        // $challenge_1 = ReadingChallange::where('state',1)->skip(0)->take(10)->get();


        // $challenge_2 = ReadingChallange::where('state',1)->skip(10)->take(10)->get();
        // $challenge_3 = ReadingChallange::where('state',1)->skip(20)->take(10)->get();
        // $challenge_4 = ReadingChallange::where('state',1)->skip(30)->take(10)->get();
        // $challenge_5 = ReadingChallange::where('state',1)->skip(40)->take(10)->get();
        // $challenge_1_count = $challenge_1->where('state', 1)->where('student_id',$id)->count();
        // $challenge_2_count = $challenge_2->where('state', 1)->where('student_id',$id)->count();
        // $challenge_3_count = $challenge_3->where('state', 1)->where('student_id',$id)->count();
        // $challenge_4_count = $challenge_4->where('state', 1)->where('student_id',$id)->count();
        // $challenge_5_count = $challenge_5->where('state', 1)->where('student_id',$id)->count();

        $user_id = $id;
        $id=$id;
        return view('admin.readingChallange_all', compact('id','challenge','user_id','challenge_1_count', 'challenge_2_count', 'challenge_3_count', 'challenge_4_count', 'challenge_5_count'));
    }

    public function readChallange_group_user($id,$parameter)
    {
        // return $id;

        $ReadingChallange = ReadingChallange::where('student_id',$parameter)->where('state',1)->skip(0)->take(10)->get();
        if ($id == 1) {
            $ReadingChallange = ReadingChallange::where('student_id',$parameter)->where('state',1)->skip(0)->take(10)->get();

        } elseif ($id == 2) {
            $ReadingChallange = ReadingChallange::where('student_id',$parameter)->where('state',1)->skip(10)->take(10)->get();

        } elseif ($id == 3) {
            $ReadingChallange = ReadingChallange::where('student_id',$parameter)->where('state',1)->skip(20)->take(10)->get();

        } elseif ($id == 4) {
            $ReadingChallange = ReadingChallange::where('student_id',$parameter)->where('state',1)->skip(30)->take(10)->get();

        } elseif ($id == 5) {
            $ReadingChallange = ReadingChallange::where('student_id',$parameter)->where('state',1)->skip(40)->take(10)->get();

        }
        $user_id = $parameter;
        $id = $id;
        return view('admin.readChallangeDetailses', compact('ReadingChallange','user_id','id'));

    }

    public function result_read_admin($id ,$parameter)
    {

        $user= Auth::user();
        $parameter=$parameter;


        return view('student.result_read',compact('user','parameter'));
    }


    public function wait_challange()
    {
        $ReadingChallange=ReadingChallange::where('state',0)->orderBy('id','desc')->paginate(100);
        return view('admin.challange.Challange_wait',compact('ReadingChallange'));
    }
    public function decline_challange()
    {
        $ReadingChallange=ReadingChallange::where('state',2)->orderBy('id','desc')->paginate(100);
        return view('admin.challange.Challange_decline',compact('ReadingChallange'));
    }
}

