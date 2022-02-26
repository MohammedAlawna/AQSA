<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class AdminController extends Controller
{
    public function addview() {
        return view('admin.add_doctor');
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
}
