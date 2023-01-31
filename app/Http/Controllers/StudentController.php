<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\File;
use App\Models\Live;
use App\Models\User;
use App\Models\Books;
use App\Models\Student;
use App\Models\Book_Read;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\AudioRecoreds;
use App\Models\ReadingChecker;
use App\Models\ReadingChallange;
use Illuminate\Support\Facades\Auth;
use App\Models\ReadingCheckerSubmits;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class StudentController extends Controller
{
    //

    public function home(Request $request)
    {
        $school_id      = $request->user()->school_id;
        $error_message  = "";
        $message        = "";
        $categories     = Categorie::all(['id', 'name']);

        // $books          = Books::join('files', 'files.id', '=', 'books.file_id')
        //                                 ->join('categories', 'categories.id', '=', 'books.category')
        //                                 ->where(['school_id' => $school_id])
        //                                 ->get(['books.*', 'categories.name', 'files.file_name']);


        return view('student.index', compact('error_message', 'message', 'categories'));
    }

    public function books(Request $request, $category)
    {

        $school_id      = $request->user()->school_id;
        $error_message  = "";
        $message        = "";
        $books          = Books::join('files', 'files.id', '=', 'books.file_id')
            ->join('categories', 'categories.id', '=', 'books.category')
            ->where(['school_id' => $school_id])
            ->where(['categories.id' => $category]);

            //
        //->get(['books.*', 'categories.name', 'files.file_name']);


        return view('student.books', compact('error_message', 'message', 'books'));
    }

    // https://3dflipbook.net/simple-jquery-pdf
    public function book(Request $request, $bookID)
    {
        $user_id    =   auth()->user()->id;
        // return $user_id;
        $error_message  = "";
        $message        = "";
        $books          = Books::join('files', 'files.id', '=', 'books.file_id')
            ->where(['books.id' => $bookID])
            ->get(['books.*', 'files.file_name'])
            ->first();
        $podcasts=[];
        // $podcasts   = AudioRecoreds::join('students', 'students.id', '=', 'audiorecoreds.student_id')
        //     ->join('files', 'files.id', '=', 'audiorecoreds.file_id')
        //     ->where(['audiorecoreds.book_id' => $bookID, 'approved' => 1])
        //     ->get(['students.name AS student_name', 'files.file_name'])
        //     ->all();

        $file_name =  $books->file_name;
        $user_id = Auth::id();

        // $school_id    =   auth()->user()->id;
        $book_read=Book_Read::where('student_id',$user_id)->where('book_id', $books->id)->count();
        // return $book_read;

        return view('student.book', compact('book_read','user_id', 'error_message', 'message', 'books', 'podcasts', 'file_name', 'bookID'));
    }

    public function live(Request $request)
    {

        $school_id      = $request->user()->school_id;
        $live           = Live::where(['school_id' => $school_id, 'active' => 1])->get(['*']);
        $url            = '';

        if ($live->count() == 1) {
            $url = $live[0]->url;
        }

        return view('student.live', compact('url'));
    }

    public function speedTypeing(Request $request)
    {
        if ($request->isMethod('post')) {
            $id = $request->user()->id;
            Student::where('id', $id)
                ->update([
                    'typeing_speed' => $request->speed
                ]);
        }

        $school_id  = $request->user()->school_id;

        $students = Student::where([
            'school_id' => "$school_id"
        ])->orderByDesc('typeing_speed')->get(['typeing_speed', 'name']);

        return view('student.speedTypeing', compact('students'));
    }

    public function readChallange_all(Request $request)
    {
        $school_id  = $request->user()->school_id;
        $challenge = ReadingChallange::where('state', 1)->where('student_id',auth()->user()->id)->count();

        $challenge_1 = ReadingChallange::where('student_id',auth()->user()->id)->where('state', 1)->skip(0)->take(10)->get();


        $challenge_2 = ReadingChallange::where('student_id',auth()->user()->id)->where('state', 1)->skip(10)->take(10)->get();
        $challenge_3 = ReadingChallange::where('student_id',auth()->user()->id)->where('state', 1)->skip(20)->take(10)->get();
        $challenge_4 = ReadingChallange::where('student_id',auth()->user()->id)->where('state', 1)->skip(30)->take(10)->get();
        $challenge_5 = ReadingChallange::where('student_id',auth()->user()->id)->where('state', 1)->skip(40)->take(10)->get();

        $challenge_1_count = $challenge_1->where('student_id',auth()->user()->id)->count();
        $challenge_2_count = $challenge_2->where('student_id',auth()->user()->id)->count();
        $challenge_3_count = $challenge_3->where('student_id',auth()->user()->id)->count();
        $challenge_4_count = $challenge_4->where('student_id',auth()->user()->id)->count();
        $challenge_5_count = $challenge_5->where('student_id',auth()->user()->id)->count();

        // return $challenge_1_count;
        $user_id = Auth::id();
        return view('student.readingChallange_all', compact('challenge','user_id','challenge_1_count', 'challenge_2_count', 'challenge_3_count', 'challenge_4_count', 'challenge_5_count'));
    }

    public function readChallange_group($id)
    {

        $ReadingChallange = ReadingChallange::where('student_id',auth()->user()->id)->skip(0)->take(10)->get();
        if ($id == 1) {
            $ReadingChallange = ReadingChallange::where('student_id',auth()->user()->id)->skip(0)->take(10)->get();

        } elseif ($id == 2) {
            $ReadingChallange = ReadingChallange::where('student_id',auth()->user()->id)->skip(10)->take(10)->get();

        } elseif ($id == 3) {
            $ReadingChallange = ReadingChallange::where('student_id',auth()->user()->id)->skip(20)->take(10)->get();

        } elseif ($id == 4) {
            $ReadingChallange = ReadingChallange::where('student_id',auth()->user()->id)->skip(30)->take(10)->get();

        } elseif ($id == 5) {
            $ReadingChallange = ReadingChallange::where('student_id',auth()->user()->id)->skip(40)->take(10)->get();

        }
        $id=$id;
        $user_id = Auth::id();
        return view('student.readChallangeDetails', compact('ReadingChallange','user_id','id'));

    }
    public function result_read($id ,$parameter)
    {
        // return $parameter;
        $user= Auth::user();
        $parameter=$parameter;

        return view('student.result_read',compact('user','parameter'));
    }

    public function readChallange(Request $request)
    {

        $error_message = "";
        $message       = "";

        if ($request->isMethod('post')) {

            $rules = [
                'title' => 'required',
                'writer_name' => 'required',
                'publishing_house' => 'required',
                'pages' => 'required',
                'summary' => 'required',
                'complete_date' => 'required',
            ];

            $messages = [
                'title.required' => 'الرجاء كتابة العنوان',
                'writer_name.required' => 'الرجاء كتابة اسم المؤلف',
                'publishing_house.required' => 'الرجاء كتابة اسم الناشر',
                'pages.required' => 'الرجاء إدخال عدد الصفحات',
                'summary.required' => 'الرجاء كتابة الملخص',
                'complete_date.required' => 'الرجاء كتابة تاريخ إكمال القراءة',
            ];

            $validator = FacadesValidator::make($request->all(), $rules, $messages);

            if ($validator->fails() == false) {

                // add data
                $student_id = $request->user()->id;
                $school_id  = $request->user()->school_id;

                $challenge = ReadingChallange::create([
                    'title' => $request->title,
                    'student_id' => $student_id,
                    'school_id' => $school_id,
                    'writer_name' => $request->writer_name,
                    'publishing_house' => $request->publishing_house,
                    'pages' => $request->pages,
                    'summary' => $request->summary,
                    'complete_date' => $request->complete_date,
                ]);

                if ($challenge) {
                    $message = 'تم الحفظ بنجاح';
                }
            } else {

                $error = $validator->errors();
                $allErrors = ""; // array();

                foreach ($error->all() as $err) {
                    //array_push($allErrors , $err);
                    $allErrors .= $err . " <br/>";
                }

                $error_message = $allErrors;
                back()->withInput($request->all());
            }
        }

        return view('student.readingChallange', compact('error_message', 'message'));
    }

    public function readingQuality(Request $request)
    {
        $sentences = ReadingChecker::cursorPaginate(15);

        return view('student.sentences', compact('sentences'));
    }

    public function readingQualityDetails(Request $request)
    {

        $message = "";

        if ($request->has('id')) {

            if ($request->isMethod('post')) {
                // add new file

                // get hash of the file
                $fileName  = "output.flac";

                $filepath  = storage_path('app/audio/' . $fileName);
                $hash      = hash_file('sha256', $filepath);
                $fileDB    = File::where(['hash' => $hash])->first();


                if ($fileDB == null) {

                    $file = new File;
                    $file->file_name = $fileName;
                    $file->hash = $hash;
                    $file->save();

                    echo $file_id = $file->id;
                } else {

                    $file_id = $fileDB->id;
                }

                $checker_submit = new ReadingCheckerSubmits();
                $checker_submit->checker_id = $request->id;
                $checker_submit->student_id = $request->user()->id;
                $checker_submit->school_id = $request->user()->school_id;
                $checker_submit->file_id = $file_id;
                $checker_submit->save();

                $message = "تم الارسال بنجاح";
            }

            $sentence = ReadingChecker::find(['id' => $request->id])->first();
        }

        return view('student.readingQuality', compact('sentence', 'message'));
    }

    public function quiz(Request $request)
    {
        return view('student.quiz');
    }

    public function uploadAudio(Request $request)
    {
        $error_message  = "";
        $message        = "";
        $fileName       = "";
        $categories = Categorie::all(['*']);

        if ($request->isMethod('post')) {
            $rules = [
                'file' => 'required|mimes:mp3|file|max:20000',
            ];

            $messages = [
                'file.required' => 'الرجاء اختيار ملف',
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
                    $request->file->storeAs('records', $fileName); // save in private path

                    $filepath = storage_path('app/records/' . $fileName);
                    $hash =  hash_file('sha256', $filepath);

                    $fileAdded = File::create([
                        'file_name' => $fileName,
                        'hash' => $hash,
                    ]);

                    $file_id = $fileAdded->id;

                    AudioRecoreds::create([
                        'file_id' =>  $file_id,
                        'student_id' => 1, //$request->student_id,
                        'book_id' => $request->book_id,
                        'school_id' => 1 // $request->school_id ,
                    ]);

                    echo $message = "تم رفع الصوت بنجاح";
                } else {

                    $file_id = $fileDB->id;

                    AudioRecoreds::create([
                        'file_id' =>  $file_id,
                        'student_id' => $request->student_id,
                        'book_id' => $request->book_id,
                        'school_id' =>  $request->school_id,
                    ]);

                    echo $message = "تم رفع الصوت بنجاح";
                }
            } else {

                $error = $validator->errors();
                $allErrors = "";

                foreach ($error->all() as $err) {
                    $allErrors .= $err . " <br/>";
                }

                echo $error_message = $allErrors;
            }
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        //Auth::logout();
        Auth::guard('student')->logout();
        return redirect('/');
    }

    public function readChallange_share(Request $request, $id)
    {
        $user_id =   $request->user_id;
       $book=Books::find($id);
       $error_message  = "";
       $message        = "";

        // return $request;;
       return view('student.readingChallange_internal',compact('user_id','book','error_message','message'));


    }


    public function readChallange_share_interal(Request $request)
    {
        // return $request;
        $error_message = "";
        $message       = "";

        if ($request->isMethod('post')) {

            $rules = [

                'summary' => 'required',

            ];

            $messages = [

                'summary.required' => 'الرجاء كتابة الملخص',

            ];

            $validator = FacadesValidator::make($request->all(), $rules, $messages);

            if ($validator->fails() == false) {

                // add data
                $user_id=$request->user_id;

                $student_id =   Student::find($user_id);
                // return $student_id;;
                // $school_id  = auth()->user()->school_id;
                // return $student_id;

                $book  = Books::find($request->book_id);
                $mytime = Carbon::now();
                $challenge = ReadingChallange::create([
                    'title' =>  $book->title,
                    'student_id' => $user_id,
                    'school_id' => $student_id->school_id,
                    'writer_name' =>  $book->author,
                    'publishing_house' => $book->Publishing_House,
                    'pages' => $book->page_number,
                    'summary' => $request->summary,
                    'complete_date' => $mytime,
                ]);

                if ($challenge) {
                    $message = 'تم الحفظ بنجاح';
                }
            } else {

                $error = $validator->errors();
                $allErrors = ""; // array();

                foreach ($error->all() as $err) {
                    //array_push($allErrors , $err);
                    $allErrors .= $err . " <br/>";
                }

                $error_message = $allErrors;
                back()->withInput($request->all());
            }
        }
        $user_id =   $request->user_id;
        $book= Books::find($request->book_id);
        return view('student.readingChallange_internal',compact('user_id','book','error_message','message'));

    }
}
