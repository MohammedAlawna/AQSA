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
            else if(Auth::user()->usertype == '1') {
                //You may manage user permissions here between than other places.
                //AAAHHH NAAEL.
                $user = user::all();
                return view('admin.home', compact('user'));
            }
            else if(Auth::user()->usertype == '2'){
                //Secretary.
                error_log("Some Message Here..");
                goToSecretaryDashboard();
            }
            else if(Auth::user()->usertype == '3'){
                //Lab Technician.
                return view('admin.secret');
                goToLabTechnicianDashboard();
            }
            else if(Auth::user()->usertype == '4'){
                //OPTIONAL:: Admin.
                goToAdminDashboard();
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

    public function goToSecretaryDashboard() {
        //Shows the Secretary Dashboard (Manage Appointments only).
            return view('secretarydashboard');
    }

    public function goToLabTechnicianDashboard(){
        //Shows the Lab Technician Dasboard (View Lab Patient, Add To Lab, etc..)
        //In the implementation, the data for the lab tech would be pushed form doctor.
        //OPTIONAL: Lab technician can choose a patient and add it to the table.       
            return view('labtechdash');
    }

    public function goToAdminDashboard(){
        //OPTIONAL..
        //Shows the admin dashboard (only reports, revenue, logs).
            return view('admindashboard');
    }

    public function uploadReport(Request $request){
        $appointment = new appointment; 
        $report = new report; 

        $report->appointid = $appointment->id;
        $report->patientname = $request->patientname;
        $report->prescription = $report->prescription;
        $report->details = $request->details;
        $report->symptoms = $request->symptoms;
        $report->age = $request->age; 
        $report->gender = $request->gender; 
        $report->adate = $appointment->adate;
        $report->appt = $appointment->appt; 
        $report->doctor = $appointment->_doctor; 

        $report->save();
        return redirect()->back()->with('message', 'Doctor has been added!');

    }


    //Upload Appointment by Guest.
    public function guestUploadAppointment(Request $request){
        $user = new user; 
        $user->name = $request->patientname; 
        $user->email = $request->patientnumber;
        $user->password = "123";
        $user->save();

        $appointment = new appointment;

        $appointment->patientname=$user->name;
        $appointment->adate = $request->appointment_date;
        $appointment->department=$request->department;
        $appointment->_doctor=$request->_doctor;

        //Full Message Inquiry.
        $appointment->info=$request->info;
        $appointment->status= "Processing..";
        if(Auth::id()) {
            $appointment->user_id = Auth::user()->id;
        }
        $appointment->save();
      //  return redirect()->back()->with('message', 'Appointment has been created!');
    }

    
    public function upload_Appointment(Request $request) {
        $user = new user; 
        $user->name = $request->patientname; 
        $user->email = $request->patientnumber;
        $user->password = "123";
        $user->save();

        $appointment = new appointment;

        $appointment->patientname=$user->name;
        $appointment->patientnumber=$request->patientnumber;
        $appointment->idcard=$request->idcard; //1
        $appointment->dob=$request->dob; //2
        $appointment->adate=$request->adate;
        $appointment->appt=$request->appt; //3
        $appointment->department=$request->department;
        $appointment->_doctor=$request->_doctor;
        $appointment->info=$request->info;
        $appointment->status= "Processing..";
        
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

    public function exportDocx() {
            $filename = 'docfile.doc';
            header("Content-Type: application/force-download");
            header( "Content-Disposition: attachment; filename=".basename($filename));
            header( "Content-Description: File Transfer");
            @readfile($filename);
    
            $htmlContent = '<html>
                            <head></head>
                            <body>
                            <h1>Report Heading: Add your title</h1>
                            <p>Attached you will find data of your generated report dude!</p>
                            </body>
                            </html>';
    
            // $content = view('users.resume.resume-content', compact('data'))->render();
            echo $htmlContent;
    }

  /*  public function cancel_appoint($id) {

        $data = appointment::find($id);
     
        

    
        $data->delete();
        return redirect()->back();
      

    }*/
}
