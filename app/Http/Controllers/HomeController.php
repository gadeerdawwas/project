<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\School;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class HomeController extends Controller
{
    //
    public function homePage()
    {
        return "homePage";
    }

    public function register(Request $request)
    {

        $error_message = "";
        $message = "";

        if ($request->isMethod('post'))
        {
            // $validate = $request->validate([
            //     'name' => 'required',
            //     'email' => 'required',
            //     'password' => 'required',
            // ]);

            $rules = array(
                'name' => 'required',
                'email' => 'required|unique:schools,email',
                'username' => 'required|unique:schools,username',
                'gender' => 'required',
                'phone' => 'required',
                'file' => 'required|mimes:jpeg,png,jpg,gif|max:20000',
                'ministerialNumber' => 'required',
                'password' => 'required',
                'acceptTOS' => 'accepted',
            );

            $messages = [
                'name.required' => 'اسم المدرسة مطلوب',
                'email.required' => 'البريد الالكتروني مطلوب',
                'email.unique' => 'هذا الايميل مستخدم مسبقاً',
                'username.required' => 'اسم المدرسة بالانجليزي مطلوب',
                'username.unique' => 'اسم المسخدم محجوز مسبقا',
                'gender.required' => 'حدد نوع المدرسة ينين / بنات',
                'phone.required' => 'رقم الهاتف مطلوب',
                'acceptTOS.required' => 'الرجاء الموافقة على الشروط والاحكام',
                'ministerialNumber.required' => 'الرقم الوزاري مطلوب',
                'password.required' => 'كلمة السر مطلوبة',
                'acceptTOS.accepted' => 'الرجاء قبول اتفاقية الاستخدام',
                'file.required' => 'الرجاء اختيار ملف',
                'file.mimes' => 'نوع الملف خاطئ',
                'file.max' => 'الرجاء رفع ملف أقل من 10 ميجابايت',
            ];

            $validator = FacadesValidator::make($request->all() , $rules, $messages);

            if($validator->fails() == false)
            {

                $fileName = time().'.'.$request->file->extension();
                $request->file->storeAs('school_profile', $fileName);// save in private path

                // create account
                $shcool = School::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'username' => $request->input('username'),
                    'gender' => $request->input('gender'),
                    'phone' => $request->input('phone'),
                    'ministerialNumber' => $request->input('ministerialNumber'),
                    'school_avater' => $fileName,
                    'password' => Hash::make($request->input('password')),
                ]);

                if ( $shcool  )
                {
                    $message = "تم إنشاء الحساب بنجاح";
                }

            }else{

                //$request->session()->flash('name');
                $error = $validator->errors();
                $allErrors = "";// array();

                foreach($error->all() as $err){
                    //array_push($allErrors , $err);
                    $allErrors .= $err . " <br/>";
                }

                $error_message = $allErrors;
                back()->withInput($request->all());

                //print_r($validator->errors());
            }

            //var_dump($validate);
        }

        return View('registerSchool' ,compact('error_message' , 'message'));

    }

    public function schoolPage( Request $request , $username )
    {
        // if (!extension_loaded('imagick'))
        //     echo 'imagick not installed';

        $error_message  = "";
        $message        = "";

        $school         = School::where(['username' => $username])->first();
        //$school_id      = $school->id;

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

                    // echo 'student loggedin';
                    return redirect()->guest('/student');
                    //return redirect()->intended('/student');

                }
                else if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
                {

                    //echo 'admin loggedin';
                    return redirect()->guest('/admin');
                    //return redirect()->intended('/admin');

                }else{

                    $error_message = "كلمة المرور او البريد الالكتروني خاطئة";
                    back()->withInput($request->all());

                }

            }
            else
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

        if( Auth::check("auth:student") ){

            return redirect()->intended('/student');

        }else if( Auth::check("auth:admin") ) {

            return redirect()->intended('/admin');

        }else{

            return view('student.login' ,compact('error_message' , 'message' , 'school'));

        }

    }

}

?>
