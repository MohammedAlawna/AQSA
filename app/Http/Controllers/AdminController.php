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

    public function uploadAppointment(Request $request) {
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
