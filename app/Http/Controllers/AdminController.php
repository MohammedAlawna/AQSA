<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

class AdminController extends Controller
{
/*
USERTYPE ROLES SHEET!
1: Doctor.
2: Secretary.
3: Lab Rechnician.
4: Administrator.
*/



    public function addview() {
        if(Auth::user()->usertype == '1'){ //This permission should be for the administrator!
            return view('admin.add_doctor');
        }
        else {
            return redirect()->back();
        }
      
    }

    public function addReportView() {
        if(Auth::user()->usertype == '1'){ //This permission should be for the administrator!
            return view('admin.add_report');
        }
        else {
            return redirect()->back();
        }
    }

    public function addAppointmentView() {
        return view('admin.add_appointment');
    }

    public function viewAppointments() {
        $appointment = appointment::all();
        
        return view('admin.view_appointments', compact('appointment'));
        
    }

    public function viewLabDepart(){
        return view('admin.lab_depart');
    }

    public function uploadDoctor(Request $request) {
        $doctor = new doctor;
       /* $image = $request->file;

        $imagename= time().".".$image->getClientoriginalExtension();

        $request->file->move('doctorimage', $imagename);

        $doctor->image = $imagename;*/

        $doctor->name=$request->name;
        $doctor->number=$request->number;
        $doctor->email=$request->email;
       // $doctor->speciality=$request->speciality;
        $doctor->speciality=$request->speciality;
        $doctor->save();

        return redirect()->back()->with('message', 'Doctor has been added!');
    }

    //TODO:: Upload Appointment For New Patient.
    public function uploadNewAppointmnet(Request $request){
        $user = new user;
        

        //Patient name -> should add new patient to the Patient/User Table.
        /*You can stick to this new function, or add a boolean value with the
        same upload appointment function below.. */

        /*
        Should be something like this->
        $user = new App\User();
        $user->password = Hash::make('the-password-of-choice');
        $user->email = 'the-email@example.com';
        $user->name = 'My Name';
        $user->save();
        and/or this command line / code: 
        DB::table('users')->insert(['name'=>'MyUsername','email'=>'thisis@myemail.com','password'=>Hash::make('123456')])

        you can refer to this thread for further help:
        https://stackoverflow.com/questions/35753951/manually-register-a-user-in-laravel
        */
    }

    public function uploadAppointment(Request $request) {
        $user = new user;
        $user->name = $request->patientname; 
        //ID
        $user->dob = $request->dob; 
        $user->password = $request->generateRandomPass(); 
        $user->save();
        /*
        first add use:: then book appointment
        */ 

        $appointment = new appointment;
        $appointment->patientname=$request->patientname;
        $appointment->patientnumber=$request->patientnumber;
        $appointment->idcard=$request->idcard;
        $appointment->dob=$request->dob;
        $appointment->adate=$request->adate;
        $appointment->appt=$request->appt;
        $appointment->department=$request->department;
        $appointment->_doctor=$request->_doctor;
        $appointment->info=$request->info;
        //$appointment->status=$request->status;
        $appointment->status='Processing..';

        if(Auth::id()) {
            $appointment->column = Auth::user()->id;
        }

        $appointment->save();
        
        return redirect()->back()->with('message', 'Appointment has been created!');  //->with('message', 'Doctor has been added!');
    }

    
    public function deleteAppointment($appointment) {

        Appointment::find($appointment)->delete();
        return redirect()->back();
    }

    public function approved($id) {

        $data = appointment::find($id);
        $data->status='Approved!';
       
        $data->save();
        return redirect()->back();
    }
    
    public function cancelled($id) {
        $data = appointment::find($id);
        // $data->status='cancelled'; still trial! code need fix!
        
         $data->save();
         return redirect()->back();
    }
   
}
