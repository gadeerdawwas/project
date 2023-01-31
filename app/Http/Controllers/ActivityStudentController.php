<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'oh';
        $activities=Activity::all();
       return view('student.activity.index',compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $message = "";
        $error_message="";
        return view('student.activity.create',compact('message','error_message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $user_id= Auth::guard('admin')->user()->name;

        $activities= Activity::create([
            'link' =>  $request->link,
            'title' =>  $request->title,
            'created_by' => $user_id
        ]);
        $message = "تمت إضافة النشاط";
        $error_message="";

        return view('student.activity.create',compact('message','error_message'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $activity=Activity::find($id);
        $activity->update([
            'show' => $activity->show +1
        ]);
        return view('student.activity.activity',compact('activity'));
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
    public function get_ISBN($ISBN)
    {
        $Books=Books::where('ISBN',$ISBN)->first();

        if ($Books) {
            $Books = $Books;
        }else{
            $Books=[];
        }
        // return $Books;
        return response()->json($Books);
    }
}
