<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'oh';
        $message = "";
        $error_message="";
        $activities=Activity::all();
       return view('admin.activity.index',compact('activities','message','error_message'));
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
        return view('admin.activity.create',compact('message','error_message'));
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

        return view('admin.activity.create',compact('message','error_message'));

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
        return view('admin.activity.activity',compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activity_edit($id)
    {
        $message = "";
        $error_message="";
        $activity=Activity::find($id);

        return view('admin.activity.edit',compact('activity','message','error_message'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activity_update(Request $request, $id)
    {
        $user_id= Auth::guard('admin')->user()->name;

        $activities= Activity::find($id)->update([
            'link' =>  $request->link,
            'title' =>  $request->title,
        ]);
        $message = "تمت تعديل النشاط";
        $error_message="";
        $activity=Activity::find($id);

        return view('admin.activity.edit',compact('activity','message','error_message'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activity_delete($id)
    {

        $activity=Activity::find($id)->delete();

        $message = "تم حذف نشاط بنجاح";
        $error_message="";
        $activities=Activity::all();
        
       return view('admin.activity.index',compact('activities','message','error_message'));    }
}
