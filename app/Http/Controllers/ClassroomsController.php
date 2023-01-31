<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassroomsController extends Controller
{
    public function index()
    {
        $school_id    =   auth('school')->user()->id;
        return $school_id;

        $error_message  = "";
        $message        = "";
        $school_id    =   auth()->user()->id;
        $classes  = Classes::where('school_id',$school_id)->get(['*']);
        return view('school.class.index' ,compact('classes','error_message' , 'message' ));

    }
}
