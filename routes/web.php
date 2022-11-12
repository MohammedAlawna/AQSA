<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [HomeController::class, 'index']);


Route::get('/home', [HomeController::class, 'redirect']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Different Pages for different permissions (Secretary, LabTech, AdminDash).
Route::get('/secretarydashboard', [HomeController::class, 'goToSecretaryDashboard']);
Route::get('/labtechdash', [HomeController::class, 'goToLabTechnicianDashboard']);
Route::get('/admindashboard', [HomeController::class, 'goToAdminDashboard']);

//Doctors System.
Route::POST('/upload_report', [AdminController::class, 'upload']);
Route::get('/add_doctor_view', [AdminController::class, 'addview']);
Route::get('/add_report_view', [AdminController::class, 'addReportView']);
Route::get('/upload_doctor', [AdminController::class, 'uploadDoctor']);

//Appointment System.
Route::get('/lab_depart', [AdminController::class, 'viewLabDepart']);
Route::get('/view_appointments', [AdminController::class, 'viewAppointments']);
Route::get('/add_appointment_view', [AdminController::class, 'addAppointmentView']);
Route::POST('/upload_appointment', [AdminController::class, 'uploadAppointment']);
Route::POST('/upload_appointment', [HomeController::class, 'upload_Appointment']);
Route::POST('/upload_guest_appointment', [HomeController::class, 'guestUploadAppointment']);
//View appointments
Route::get('/myappointment', [HomeController::class, 'myappointment']);

//Push Lab Data
Route::get('export-docx', [HomeController::class, 'exportDocx'])->name('export-docx');




//Route::POST('/add_report_view', [HomeController::class, 'upload_report']);

//Delete Appointment.
//Route::delete('/delete-appointment/{appointment}',[HomeController::class, 'delete']); no appoint view for users!
//Route::POST('/delete-appointment/{appointment}', [HomeController::class, 'delete']);
Route::delete('/delete-appointment/{appointment}',[AdminController::class, 'deleteAppointment']);
//Approving/Cancelling the appointment!
Route::post('/approved/{id}', [AdminController::class, 'approved']);
//Route::get('/cancelled/{id}', [AdminController::class, 'cancelled']);
Route::get('export-docx', [HomeController::class, 'exportDocx'])->name('export-docx');
//Route::get('upload_report', [AdminController::class, 'createDoctorReport'])->name('upload_report');
