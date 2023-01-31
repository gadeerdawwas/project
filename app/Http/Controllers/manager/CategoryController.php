<?php

namespace App\Http\Controllers\manager;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Categorie::orderBy('id','desc')->get();
        return view('dashboard.category.index',compact('categories'));
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
        $image_name ='';
        if ($request->has('image')) {
            $FileEx = $request->file('image')->getClientOriginalExtension();
            $image_name = time() . '_' . rand() . '.' . $FileEx;
            $request->file('image')->move(public_path('upload/categories'), $image_name);
        }
       Categorie::create([
        'name' => $request->name,
        'image' => $image_name
       ]);

       return redirect()->route('manager.categories.index')->with('success', 'تم إضافة القسم بنجاح');

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
        $Categorie=Categorie::find($id);
        $image_name =$Categorie->image;
        if ($request->has('image')) {
            $FileEx = $request->file('image')->getClientOriginalExtension();
            $image_name = time() . '_' . rand() . '.' . $FileEx;
            $request->file('image')->move(public_path('upload/categories'), $image_name);
        }else{
            $extension = explode('/',  $image_name);
            $image_name = end($extension);
        }

        Categorie::find($id)->update([
            'name' => $request->name,
            'image' => $image_name

           ]);

           Session::flash('message', 'تم نعديل القسم بنجاح');
           return redirect()->route('manager.categories.index')->with('success', 'تم نعديل القسم بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categorie::find($id)->delete();
        Session::flash('message', 'تم حذف القسم بنجاح');

        return redirect()->route('manager.categories.index')->with('success', 'تم حذف القسم بنجاح');

    }
}
