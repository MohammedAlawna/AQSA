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

    public function createDoctorReport($patientName, $presc, $symp, $gender, $age){
        $filename = 'doctor_report.doc';
        header("Content-Type: application/force-download");
        header( "Content-Disposition: attachment; filename=".basename($filename));
        header( "Content-Description: File Transfer");
        @readfile($filename);

        $reportSheet = "";
        echo "Patient Name: ";
        echo $patientName;
        echo "\n";

        echo "Gender: ";
        echo $gender; 
        echo "\n";

        echo "Age: ";
        echo $age; 
        echo "\n";

        echo "Prescription: ";
        echo $presc;
        echo "\n";

        echo "Symptoms: "; 
        echo $symp;
        echo "\n";


        // echo "Prescription: ";
        // echo $prec;

        // echo "Symptoms: ";
        // echo $symp;
    }
   

    public function upload(Request $request){
         $appointment = new appointment; 
         $report = new report;

        $nameOfPatient = $request->patientname;
       
        $appointDb = appointment::where('patientname', $nameOfPatient)->get();
  
        $report->adate = $appointDb[0]->adate;
        $report->appt = $appointDb[0]->appt;  
        $report->doctor = $appointDb[0]->_doctor; 
        $report->appointid = $appointDb[0]->id;
        $report->patientname = $request->patientname;
        $report->prescription = $request->prescription;
        $report->details = $request->details;
        $report->symptoms = $request->symptoms;
        $report->age = $request->age; 
        $report->gender = $request->gender; 
       
        $report->save();

        $presc = $request->prescription;
        $symp = $request->symptoms;
        $_gender = $request->gender; 
        $_age = $request->age;

        $this->createDoctorReport($nameOfPatient, $presc, $symp, $_gender, $_age );
      // return redirect()->back()->with('message', 'Doctor Report has been added!');
    }

   

    public function generateDocRep() { 
        //Doctor View Report       
        $filename = "Doctor_report.doc";
        header("Content-Type: application/force-download");
        header( "Content-Disposition: attachment; filename=".basename($filename));
        header( "Content-Description: File Transfer");
        @readfile($filename);

         $htmlContent ='<html>
                         <head></head>
                         <body>
                         <h1>Report Heading: Add your title</h1>
                         <p> $report->patientname </p>
                         <p>Attached you will find data of your generated report dude!</p>
                         </body>
                         </html>'. ' '. 'Hell';

        echo $htmlContent;
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
      

        $doctor->name=$request->name;
        $doctor->number=$request->number;
        $doctor->email=$request->email;
     
        $doctor->speciality=$request->speciality;
        $doctor->save();

        return redirect()->back()->with('message', 'Doctor has been added!');
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
