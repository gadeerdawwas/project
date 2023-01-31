<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Classes;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school_id    =   auth()->user()->id;
        // return $school_id;

        $error_message  = "";
        $message        = "";
        $school_id    =   auth()->user()->id;
        $classes  = Classes::where('school_id',$school_id)->get(['*']);
        return view('school.class.index' ,compact('classes','error_message' , 'message' ));

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
        $school_id    =   auth()->user()->id;
        $admin=Admin::where('school_id',$school_id)->get();
        $Classrooms=Classroom::where('school_id',$school_id)->get();
        return view('school.class.create' ,compact('admin','Classrooms','error_message' , 'message' ));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $school_id    =   auth()->user()->id;
        $admin=Admin::where('school_id',$school_id)->get();
        Classes::create([
            'name' => $request->name,
            'classroom' => $request->classroom,
            'number' => $request->number,
            'admin_id' => $request->admin_id,
            'school_id' => $school_id,

        ]);
        $error_message  = "";
        $message        = "تم أضافة الصف بنجاح";
        $Classrooms=Classroom::where('school_id',$school_id)->get();


        return view('school.class.create' ,compact('Classrooms','admin','error_message' , 'message' ));


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

        $school_id    =   auth()->user()->id;
        $classes  = Classes::where('school_id',$school_id)->get(['*']);
        $class  = Classes::find($id);
        $admin=Admin::where('school_id',$school_id)->get();
        $Classrooms=Classroom::where('school_id',$school_id)->get();

        return view('school.class.edit' ,compact('Classrooms','admin','class','classes','error_message' , 'message' ));

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
        $school_id    =   auth()->user()->id;
        Classes::find($id)->update([
            'name' => $request->name,
            'classroom' => $request->classroom,
            'number' => $request->number,

            'admin_id' => $request->admin_id,


        ]);
        $error_message  = "";
        $message        = "تم تعديل الصف بنجاح";
        $classes  = Classes::where('school_id',$school_id)->get(['*']);

        $class  = Classes::find($id);
        $admin=Admin::where('school_id',$school_id)->get();
        $Classrooms=Classroom::where('school_id',$school_id)->get();

        return view('school.class.edit' ,compact('Classrooms','admin','class','classes','error_message' , 'message' ));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }
    public function class_delete($id)
    {
        $error_message  = "";
        $message        = "تم حذف صف بنجاح";
        $school_id    =   auth()->user()->id;
        Classes::find($id)->delete();
        // $id_i_deleted=$classes  = Classes::where('school_id',$school_id)->get(['*']);
        // Admin::where('admin_id', '=', $id)->update(['admin_id' => null]);
        $classes  = Classes::where('school_id',$school_id)->orderBy('id','desc')->get(['*']);
        $Classrooms=Classroom::where('school_id',$school_id)->get();

        return view('school.class.index' ,compact('Classrooms','classes','error_message' , 'message' ));


    }
}
