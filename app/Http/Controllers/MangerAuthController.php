<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MangerAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:manager')->except('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('manager')->attempt($request->only(['username','password']))){
            return redirect()->route('manager.home');
        }

        return back()->withInput($request->only('username', 'remember'));
    }
}
