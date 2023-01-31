<?php

namespace App\Http\Controllers;


use App\Models\Books;
use App\Models\Book_Read;
use App\Models\Student;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class BookController extends Controller
{
    public function singlebook($id)
    {


       $error_message  = "";
       $message        = "";
       $books          = Books::join('files', 'files.id', '=', 'books.file_id')
                       ->where(['books.id' => $id])
                       ->get(['books.*', 'files.file_name'])
                       ->first();

       $file_name =  $books->file_name;

       return view('school.book' ,compact('error_message' , 'message' , 'books' , 'file_name'));
    }

    public function read_book(Request $request, $id)
    {
        // $user_id    =   auth()->user()->id;
        // return $user_id;
        // return   $request;
        // $user_id    =   auth()->user()->id;
        Book_Read::create([
            'student_id' => $request->user_id,
            'book_id' => $id,
            'state_read' => $request->state_read,
            // 'user_id' => $user_id,
            'evaluation' => $request->evaluation,
        ]);
        $message = "تمت إضافة التقييم";
        return redirect()->back()->with('message');


    }
    public function evaluation(Request $request)
    {

        // $school_id      = $request->admin()->school_id;

        $school_id    =   auth('admin')->user()->school_id;
        $student_id=Student::where('school_id',$school_id)->pluck('id');
        $book_read=Book_Read::whereIn('student_id',$student_id)->get();

        // return  $stufent;


        return view('admin.evauation',compact('book_read'));

    }


}
