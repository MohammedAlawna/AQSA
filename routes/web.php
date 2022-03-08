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

//Doctors System.
Route::get('/add_doctor_view', [AdminController::class, 'addview']);
Route::POST('/upload_doctor', [AdminController::class, 'uploadDoctor']);

//Appointment System.
Route::get('/view_appointments', [AdminController::class, 'viewAppointments']);
Route::get('/add_appointment_view', [AdminController::class, 'addAppointmentView']);
Route::POST('/upload_appointment', [AdminController::class, 'uploadAppointment']);
Route::POST('/upload_appointment', [HomeController::class, 'upload_Appointment']);
//View appointments
Route::get('/myappointment', [HomeController::class, 'myappointment']);
//Delete Appointment.
Route::delete('/delete-appointment/{appointment}',[HomeController::class, 'delete']);
//Route::POST('/delete-appointment/{appointment}', [HomeController::class, 'delete']);
Route::delete('/delete-appointment/{appointment}',[AdminController::class, 'deleteAppointment']);
//Approving/Cancelling the appointment!
Route::get('/approved/{id}', [AdminController::class, 'approved']);
Route::get('/cancelled/{id}', [AdminController::class, 'cancelled']);