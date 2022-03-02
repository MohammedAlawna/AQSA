<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

class AdminController extends Controller
{
    public function addview() {
        return view('admin.add_doctor');
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

        if(Auth::id()) {
            $appointment->column = Auth::user()->id;
        }

        $appointment->save();
        return redirect()->back()->with('message', 'Appointment has been created!');  //->with('message', 'Doctor has been added!');
    }

   
}
