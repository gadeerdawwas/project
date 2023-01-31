<?php

namespace App\Http\Controllers;

use App\Models\School;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class LoginController extends Controller
{

    // admin login
    public function admin(Request $request)
    {
        // return redirect()->route('login');

        $error_message = "";
        $message = "";


        if ($request->isMethod('post'))
        {
            $rules = array(
                'email' => 'required',
                'password' => 'required',
            );

            $messages = [
                'email.required' => 'البريد الالكتروني مطلوب',
                'password.required' => 'كلمة السر مطلوبة',
            ];

            $validator = FacadesValidator::make($request->all() , $rules, $messages);

            if($validator->fails() == false)
            {

                if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
                {

                    return redirect()->intended('/admin');

                }else{

                    $error_message = "كلمة المرور او البريد الالكتروني خاطئة";
                    back()->withInput($request->all());

                }

            }else
            {

                back()->withInput($request->all());

            }


        }
        return view('school.login' ,compact('error_message' , 'message'));

        // return view('admin.login' ,compact('error_message' , 'message'));
        //return back()->withInput($request->only('email', 'remember'));
    }

    public function school(Request $request)
    {
        $error_message = "";
        $message = "";

        if ($request->isMethod('post'))
        {

            $rules = array(
                'email' => 'required',
                'password' => 'required',
            );

            $messages = [
                'email.required' => 'البريد الالكتروني مطلوب',
                'password.required' => 'كلمة السر مطلوبة',
            ];

            $validator = FacadesValidator::make($request->all() , $rules, $messages);

            if($validator->fails() == false)
            {

                if (Auth::guard('school')->attempt(['email' => $request->email, 'password' => $request->password]))
                {

                    return redirect('/school');//->intended('/school');

                }else if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
                {

                    return redirect('/admin');//->intended('/admin');

                }else if (Auth::guard('student')->attempt([ 'id_number' => $request->email, 'password' => $request->password]))
                {

                    return redirect('/student');//->intended('/student');

                }else if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password]))
                {

                    return redirect('/teacher');//->intended('/student');

                }else{

                    $error_message = "كلمة المرور او البريد الالكتروني خاطئة";
                    back()->withInput($request->all());

                }

            }else
            {

                $error_message = "كلمة المرور او البريد الالكتروني خاطئة";
                back()->withInput($request->all());

            }


        }

        return view('school.login' ,compact('error_message' , 'message'));
    }

    public function login(Request $request , $username )
    {
        $error_message = "";
        $message = "";

        $school = School::where(['username' => $username])->first();

        if($school == null)
        {
            abort(Response::HTTP_NOT_FOUND);
            return;
        }

        if ($request->isMethod('post'))
        {

            $rules = array(
                'email' => 'required',
                'password' => 'required',
            );

            $messages = [
                'email.required' => 'البريد الالكتروني مطلوب',
                'password.required' => 'كلمة السر مطلوبة',
            ];

            $validator = FacadesValidator::make($request->all() , $rules, $messages);

            if($validator->fails() == false)
            {

                if (Auth::guard('student')->attempt([ 'id_number' => $request->email, 'password' => $request->password]))
                {

                    return redirect()->intended('/student');

                }else if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
                {

                    return redirect()->intended('/admin');

                } else {

                    $error_message = "كلمة المرور او البريد الالكتروني خاطئة";
                    back()->withInput($request->all());

                }

            }else
            {
                $error = $validator->errors();
                $allErrors = "";

                foreach($error->all() as $err){
                    $allErrors .= $err . " <br/>";
                }

                $error_message = $allErrors;
                back()->withInput($request->all());

            }


        }

        return view('student.login' ,compact('error_message' , 'message' , 'school'));
    }

    public function student(Request $request, $username)
    {

        $error_message = "";
        $message = "";

        $school = School::where(['username' => $username])->first();

        if($school == null)
        {
            abort(Response::HTTP_NOT_FOUND);
            return;
        }

        if ($request->isMethod('post'))
        {
            //echo 'is post';

            $rules = array(
                'email' => 'required',
                'password' => 'required',
            );

            $messages = [
                'email.required' => 'البريد الالكتروني مطلوب',
                'password.required' => 'كلمة السر مطلوبة',
            ];

            $validator = FacadesValidator::make($request->all() , $rules, $messages);

            if($validator->fails() == false)
            {

                if (Auth::guard('student')->attempt([ 'id_number' => $request->email, 'password' => $request->password]))
                {

                    return redirect('/student');//->intended('/student');

                }else{

                    $error_message = "كلمة المرور او البريد الالكتروني خاطئة";
                    back()->withInput($request->all());

                }

            }else
            {
                $error = $validator->errors();
                $allErrors = "";

                foreach($error->all() as $err){
                    $allErrors .= $err . " <br/>";
                }

                $error_message = $allErrors;
                back()->withInput($request->all());

            }


        }

        return view('student.login' ,compact('error_message' , 'message' , 'school'));

    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }

}
