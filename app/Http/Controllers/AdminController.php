<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Report;
use App\Models\Labpatient;
use App\Http\Controllers\HomeController;
//require_once 'bootstrap.php';


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

        $isDoctorReport = $request->doctorReport;
        $isPatientReport = $request->patientReport;
        $isLabTest = $request->labTest;

         //Form Check Var
         if($isDoctorReport == "true"){
          // $this->createDoctorReport($nameOfPatient, $presc, $symp, $_gender, $_age);
          $this->createWordDocPHPWord();
        }
            
        if($isLabTest == "true"){
         //Patient Info And Lab Test Should Be Added To Form.
         //You Should Find A Way To Add Lab Tests Here.
         $labpatient = new labpatient;
         $labpatient->patientname = $request->patientname;
         $labpatient->age = $request->age;
         $labpatient->gender = $request->gender;
         $labpatient->doctor = $appointDb[0]->_doctor;
         $labpatient->labtests = $request->labDep;

         $labpatient->save();
        }

        if($isPatientReport == "true"){
         echo "Patient Report True";
          //$this->generateUserReport();
        }

       return redirect()->back()->with('message', 'Doctor Report has been added!');
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

    public function updatePatientData(Request $request){
      //  $labpatient = new labpatient;
        $requiredName = $request->patientname;
        $labpatient = labpatient::where('patientname', $requiredName)->get();
        $labpatient[0]->labtests = $request->labRes;
        $labpatient[0]->save();
        return redirect()->back()->with('message', 'Patient Lab Tests Has Been Updated!');
    }


    public function exportDocx(Request $request) {
        //Update Patient Data.
        $patientName = $request->patientname;
        echo($patientName);
        debug_to_console($patientName);
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
        //Testing Only.
        $labpatient = labpatient::all();
        return view('admin.lab_depart', compact('labpatient'));
        
        //User Lab Only!
        if(Auth::user()->usertype == "3"){

            return view('admin.lab_depart');
        }
        // else {
        //     return view('admin.denied');
        //     //return redirect()->back();
        // }
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

    public function createWordDocPHPWord(){
       // Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

/* Note: any element you append to a document must reside inside of a Section. */

// Adding an empty Section to the document...
$section = $phpWord->addSection();
// Adding Text element to the Section having font styled by default...
$section->addText(
    '"Learn from yesterday, live for today, hope for tomorrow. '
        . 'The important thing is not to stop questioning." '
        . '(Albert Einstein)'
);

/*
 * Note: it's possible to customize font style of the Text element you add in three ways:
 * - inline;
 * - using named font style (new font style object will be implicitly created);
 * - using explicitly created font style object.
 */

// Adding Text element with font customized inline...
$section->addText(
    '"Great achievement is usually born of great sacrifice, '
        . 'and is never the result of selfishness." '
        . '(Napoleon Hill)',
    array('name' => 'Tahoma', 'size' => 10)
);

// Adding Text element with font customized using named font style...
$fontStyleName = 'oneUserDefinedStyle';
$phpWord->addFontStyle(
    $fontStyleName,
    array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
);
$section->addText(
    '"The greatest accomplishment is not in never falling, '
        . 'but in rising again after you fall." '
        . '(Vince Lombardi)',
    $fontStyleName
);

// Adding Text element with font customized using explicitly created font style object...
$fontStyle = new \PhpOffice\PhpWord\Style\Font();
$fontStyle->setBold(true);
$fontStyle->setName('Tahoma');
$fontStyle->setSize(13);
$myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
$myTextElement->setFontStyle($fontStyle);

// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('helloWorld.docx');

// Saving the document as ODF file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
$objWriter->save('helloWorld.odt');

// Saving the document as HTML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
$objWriter->save('helloWorld.html');

/* Note: we skip RTF, because it's not XML-based and requires a different example. */
/* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */
    }
   
}
