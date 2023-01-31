<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // https://demos.creative-tim.com/paper-dashboard/examples/dashboard.html
    // https://www.positronx.io/how-to-properly-install-and-use-bootstrap-in-laravel/

    public function test(Request $request)
    {
        if(Auth::check()){
            print("You logged in<br/>");
        }else{
            print("You not logged in<br/>");
        }

        // $request->validate([
        //     'user' => 'required',
        //     'pass' => 'required',
        // ]);

        $credentials = $request->only('user', 'pass');
        //dd($credentials);

        if (Auth::attempt($credentials)) {
           print(">>>>>logged in<br/>");
        }

        return view('login');
        //return "Test";
    }
    public function result_read($id ,$parameter)
    {
        // return $id;

        $user=Student::find($id);
        $parameter=$parameter;
    //    return $user;
        return view('student.result_read',compact('user','parameter'));
    }
}
