<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $error_message  = "";
        $message        = "";
        $school_id    =   auth('school')->user()->id;
        $classrooms  = Classroom::where('school_id',$school_id)->orderBy('id','asc')->get(['*']);
        return view('school.classroom.index' ,compact('classrooms','error_message' , 'message' ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $error_message  = "";
        $message        = "";
        $school_id    =   auth('school')->user()->id;

        return view('school.classroom.create' ,compact('error_message' , 'message' ));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $school_id    =   auth('school')->user()->id;
        Classroom::create([
            'name' => $request->name,
            'school_id' => $school_id,

        ]);
        $error_message  = "";
        $message        = "تم أضافة الفصل بنجاح";


        return view('school.classroom.create' ,compact('error_message' , 'message' ));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $error_message  = "";
        $message        = "";
        // $Schools  = School::get(['*']);

        $school_id    =   auth('school')->user()->id;
        $Classrooms  = Classroom::where('school_id',$school_id)->get(['*']);
        $Classroom  = Classroom::find($id);

        return view('school.classroom.edit' ,compact('Classrooms','Classroom','error_message' , 'message' ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $error_message  = "";
        $message        = "";

        $school_id    =   auth('school')->user()->id;
        Classroom::find($id)->update([
            'name' => $request->name,

        ]);
        $error_message  = "";
        $message        = "تم تعديل فصل  بنجاح";
        $Classrooms  = Classroom::where('school_id',$school_id)->get(['*']);
        $Classroom  = Classroom::find($id);

        return view('school.classroom.edit' ,compact('Classrooms','Classroom','error_message' , 'message' ));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function classrooms_delete($id)
    {
        $error_message  = "";
        $message        = "تم حذف الفصل بنجاح";
         Classroom::find($id)->delete();

        $school_id    =   auth('school')->user()->id;
        $classrooms  = Classroom::where('school_id',$school_id)->get(['*']);
        return view('school.classroom.index' ,compact('classrooms','error_message' , 'message' ));

    }
}
