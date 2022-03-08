<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;


class HomeController extends Controller
{
    public function redirect() {
        if(Auth::id()) {
            if(Auth::user()->usertype == '0'){
                $doctor = doctor::all();
                return view('user.home', compact('doctor'));
            }
            else {
                
                return view('admin.home');
            }

        }
        else
        {
            return redirect()->back();
        }
    }

    public function index() {
        if(Auth::id()) {
            return redirect('home');
        }
        else
        {
            $doctor = doctor::all();
           
            return view('user.home',compact('doctor'));
        }
       
    }

    public function upload_Appointment(Request $request) {
        $appointment = new appointment;

        $appointment->patientname=$request->patientname;
        $appointment->patientnumber=$request->patientnumber;
        //$appointment->idcard=$request->idcard;
        //$appointment->dob=$request->dob;
        $appointment->adate=$request->adate;
        //$appointment->appt=$request->appt;
        $appointment->department=$request->department;
        $appointment->_doctor=$request->_doctor;
        $appointment->info=$request->info;
        
       // $appointment->column = Auth::user()->id;
          if(Auth::id()) {
             $appointment->user_id = Auth::user()->id;
      }

        $appointment->save();
        return redirect()->back()->with('message', 'Appointment has been created!');  //->with('message', 'Doctor has been added!');
    }

    public function myappointment() {
        //Prevent un-logged in users from accessing the appointments site!
        if(Auth::id()) {
            $userid = Auth::user()->id;
            $appoint = appointment::where('user_id', $userid)->get();
            return view('user.my_appointment', compact('appoint'));
        }
        else {
            return redirect()->back();
        }
    }

    public function delete($appointment) {

        Appointment::find($appointment)->delete();
        return redirect()->back();
    }

  /*  public function cancel_appoint($id) {

        $data = appointment::find($id);
     
        

    
        $data->delete();
        return redirect()->back();
      

    }*/
}
