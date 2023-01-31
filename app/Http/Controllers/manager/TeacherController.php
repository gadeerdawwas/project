<?php

namespace App\Http\Controllers\manager;

use App\Models\School;
use App\Models\Teachers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Teachers=Teachers::orderBy('id','desc')->get();
        $Schools=School::all();
        return view('dashboard.teacher.index',compact('Teachers','Schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Teachers::create([
            'name' =>  $request->name,
            'email' =>  $request->email,
            'password' => Hash::make($request->password),
            'school_id' => $request->school_id
        ]);
        return redirect()->route('manager.teachers.index')->with('success', 'تم إضافة المعلم بنجاح');

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
        Teachers::find($id)->update([
            'name' =>  $request->name,
            'email' =>  $request->email,
            'school_id' => $request->school_id
        ]);
        return redirect()->route('manager.teachers.index')->with('success', 'تم تعديل المعلم بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        Teachers::find($id)->delete();
        return redirect()->route('manager.teachers.index')->with('success', 'تم حذف المعلم بنجاح');
    }
}
