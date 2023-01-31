<?php

namespace App\Http\Controllers\manager;

use App\Models\School;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::orderBy('id','desc')->get();
        $Schools=School::all();
        return view('dashboard.student.index',compact('students','Schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Schools=School::all();
        $classes=Classes::all();
        return view('dashboard.student.create',compact('Schools','classes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $admin_id=Classes::where('id',$request->class)->first();
            $admin_id=$admin_id->admin_id;


        } catch (\Throwable $th) {
            $admin_id=null;
        }
        Student::create([
            'name' =>  $request->name,
            'id_number' =>  $request->id_number,
            'password' => Hash::make($request->password),
            'class' => $request->class,
            'school_id' => $request->school_id,
            'admin' => $admin_id,
        ]);
        return redirect()->route('manager.students.index')->with('success', 'تم إضافة الطالب بنجاح');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
