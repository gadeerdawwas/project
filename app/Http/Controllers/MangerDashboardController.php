<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Books;
use App\Models\School;
use App\Models\Categorie;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class MangerDashboardController extends Controller
{
    protected $redirectTo = '/login';
    public const HOME = '/login';

    public function __construct()
    {
        $this->middleware('auth:manager');

    }

    public function home()
    {
        return view('dashboard.index');
    }
    public function books()
    {
        $books=Books::orderBy('id','desc')->get();
        return view('dashboard.book.index',compact('books'));
    }
    public function addbook()
    {
        $categories=Categorie::all();
        $Schools=School::all();
        return view('dashboard.book.create',compact('categories','Schools'));
    }
    public function savebook(Request $request)
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
                            'school_id' =>  $request->school_id,
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
                            'school_id' =>  $request->school_id,
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



                    // look for file vis hash

                        Books::create([
                            'school_id' =>  $request->school_id,
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
        $categories=Categorie::all();
        $Schools=School::all();
        return redirect()->route('manager.addbook')->with('success', 'تم إضافة الكتاب بنجاح');

        // return view('dashboard.book.create', compact('message','categories','Schools'));

    }

    public function deletebook( $bookID)
    {
        Books::find($bookID)->delete();
        Session::flash('message', 'تم  حذف الكتاب بنجاح');


    }
    public function editbook( $bookID)
    {   $categories=Categorie::all();
        $Schools=School::all();
        $Books=Books::find($bookID);
        return view('dashboard.book.edit',compact('Books','categories','Schools'));

    }
    public function showbook( $bookID)
    {   $categories=Categorie::all();
        $Schools=School::all();
        $Books=Books::find($bookID);
        return view('dashboard.book.show',compact('Books','categories','Schools'));

    }

    public function updatebook(Request $request ,$id)
    {


        // phpinfo(INFO_CONFIGURATION);

        $error_message  = "";
        $message        = "";
        $fileName       = "";
        $categories = Categorie::all(['*']);

        Books::find($id)->update([
            'school_id' =>  $request->school_id,
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
        Session::flash('message', 'تم  تعديل الكتاب بنجاح');

    }

    public function getclass($id)
    {


        $collection = Classes::with('Classroom')->where('school_id',$id)->get();

        return response()->json($collection);
    }
}
