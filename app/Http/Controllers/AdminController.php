<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Report;
use App\Http\Controllers\HomeController;

class AdminController extends Controller
{
   

    
    public function addview() {
        /*If user is superadmin (alternatively, you could 
        do it for a super-doctor as well)*/
        if(Auth::user()->usertype == '1'){ 
            return view('admin.add_doctor');
        }
        else {
            return view('admin.denied');
            //return redirect()->back();
        }
    }

    public function addReportView() {
        //If User Is Doctor..
        if(Auth::user()->usertype == '1'){ 
           $user = user::all();
            return view('admin.add_report', compact('user'));
        }
        else {
            return view('admin.denied');
            //return redirect()->back();
        }
    }

    public function upload(Request $request){
        // $appointment = new appointment; 
        // $report = new report;


        //TODO:: Retrieve appointment for that specific patient
        //If patient name in that appointment, then assign values here!
      
        // $patientID = Auth::user()->id;  replace to userName
        
        $nameOfPatient = $request->patientname;
        //Then check with userName..
        $appointDb = appointment::where('patientname', $nameOfPatient)->get();
        
        echo $appointDb[0]->id;

        //$appoint = appointment::where('patientname', $nameOfPatient)->get();
        $report->adate = $appointDb[0]->adate;
        $report->appt = $appointDb[0]->appt;  
        $report->doctor = $appointDb[0]->_doctor; 
        $report->appointid = $appointDb[0]->id;
        
        // $report->appointid = $appointment->id;
        $report->patientname = $request->patientname;
        $report->prescription = $request->prescription;
        $report->details = $request->details;
        $report->symptoms = $request->symptoms;
        $report->age = $request->age; 
        $report->gender = $request->gender; 
       

        $report->save();
       // $appointment->save();

        //Export The Report (DOC File).
        //exportDocx();

        return redirect()->back()->with('message', 'Doctor Report has been added!');
    }

    public function generateDocRep() { //Doctor View Report
        $filename = 'docfile.doc';
        header("Content-Type: application/force-download");
        header( "Content-Disposition: attachment; filename=".basename($filename));
        header( "Content-Description: File Transfer");
        @readfile($filename);


      //  $name = $_GET['patientname'];
        //Retrieve Data from DB / Request and embed them here inside the word file (report)

        $htmlContent ='<html>
                        <head></head>
                        <body>
                        <h1>Report Heading: Add your title</h1>
                        <p> $report->patientname </p>
                        <p>Attached you will find data of your generated report dude!</p>
                        </body>
                        </html>'. ' '. 'Hell';

        //You can do this as well (In that way..)
        // $content = view('users.resume.resume-content', compact('data'))->render();
        echo $htmlContent;

       // echo $name;
}

public function exportPatientReport(){
    //Patient View.
    //TODO Code to be added later on.
}

    public function addAppointmentView() {
         //User Doctor or Secret.
         if(Auth::user()->usertype == "2" || Auth::user()->usertype == "1"){
            return view('admin.add_appointment');
         }
         else {
            return view('admin.denied');
            //return redirect()->back();
         }
       
    }

    public function viewAppointments() {
        //User Doctor or Secret.
        if(Auth::user()->usertype == ''){

        }
        $appointment = appointment::all();
        
        return view('admin.view_appointments', compact('appointment'));
        
    }

    public function viewLabDepart(){
        //User Lab Only!
        if(Auth::user()->usertype == "3"){
            return view('admin.lab_depart');
        }
        else {
            return view('admin.denied');
            //return redirect()->back();
        }
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
        // $user = new user;
        // $user->name = $request->patientname; 
        // //ID
        // $user->dob = $request->dob; 
        // $user->password = $request->generateRandomPass(); 
        // $user->save();
        // /*
        // first add user:: then book appointment
        // */ 

        // $appointment = new appointment;
        
        // $appointment->patientname=$user->name;
        // $appointment->patientnumber=$request->patientnumber;
        // $appointment->idcard=$request->idcard;
        // $appointment->dob=$user->dob;
        // $appointment->adate=$request->adate;
        // $appointment->appt=$request->appt;
        // $appointment->department=$request->department;
        // $appointment->_doctor=$request->_doctor;
        // $appointment->info=$request->info;
        // //$appointment->status=$request->status;
        // $appointment->status='Processing..';
       
        // if(Auth::id()) {
        //     $appointment->column = Auth::user()->id;
        // }

        // $appointment->save();
        
        // return redirect()->back()->with('message', 'Appointment has been created!');  //->with('message', 'Doctor has been added!');
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
