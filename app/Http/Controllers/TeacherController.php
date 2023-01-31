<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    
    public function index(Request $request)
    {

        $school_id      = $request->user()->school_id;
        $my_id          = $request->user()->id;

        $appointments    = Appointments::where(['appointments.school_id' => $school_id , 'appointments.teatcher_id' => $my_id])      
        ->get(['appointments.*']);
        
        return view('teacher.appointments' , compact(['appointments']));
    }
    
    

    public function appointments(Request $request)
    {
        session_start();        
        $error_message  = "";
        $school_id      = $request->user()->school_id;
        $my_id          = $request->user()->id;

        if($request->isMethod("post"))
        {

           

            $checking = Appointments::
            where(['appointments.school_id' => $school_id , 'appointments.date' => $request->date , 'slot' => $request->slot]);            

            if($checking->count() == 0)
            {
                $_SESSION['date'] = $request->date;
                $_SESSION['slot'] = $request->slot;
                return redirect('/teacher/bookAppointment');

            }else{

                $error_message  = "هذا الموعد محجوز مسبقاً, حاول في موعد آخر";

            }

        }
        

        $appointments    = Appointments::where(['appointments.school_id' => $school_id , 'appointments.teatcher_id' => $my_id])      
        ->get(['appointments.*']);
        
        return view('teacher.booking' , compact(['appointments' , 'error_message']));

    }

    public function bookAppointment(Request $request)
    {
        session_start();
        $error_message  = "";
        $message        = "";
        

        if( empty($_SESSION['date']) || empty($_SESSION['slot']) )
        {
            return redirect('/teacher');
        }

        if($request->isMethod("post"))
        {

            $school_id      = $request->user()->school_id;
            $my_id          = $request->user()->id;

            Appointments::create([
                'teatcher_id' =>  $my_id ,
                'date' =>  $request->date ,
                'slot' => $request->slot,  
                'school_id' => $school_id
            ]);

            $message = "تم تأكيد حجزك بنجاح شكراً لك";

        }


        return view('teacher.confirmBooking' , compact(['error_message' , 'message']));

    }

    public function logout(Request $request) 
    {
        Auth::guard('teacher')->logout();
        return redirect('/');
    }

}
