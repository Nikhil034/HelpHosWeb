<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DynamiPdfController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dynamic_pdf/pdf/{id}', [DynamiPdfController::class,'pdf']);
Route::get('/dynamic_pdf', [DynamiPdfController::class,'index']);
Route::post('/Printreport', [DynamiPdfController::class,'pdf']);
Route::get('/viewprint/{id}',[DynamiPdfController::class,'pdf2']);

Route::get('/Medical',[DoctorController::class,'Medicineload'])->name('Medicinebydoctor');
Route::get('/Doctor',[DoctorController::class,'loadToken'])->name('LoadPatientToken');
Route::get('/FetchPatient',[DoctorController::class,'FetchTokenData'])->name('AjaxCallForPatientData');
Route::post('/Doctordetailsadd',[DoctorController::class,'DoctorDetailsforpatient'])->name('Savedrugdetailsbydoctor');
Route::get('/Updatedrug/{id}',[DoctorController::class,'Updatedrug'])->name('druggivenbyperson');
Route::post('/Updatedrugsave',[DoctorController::class,'Updatedrugsave'])->name('Makeposttosavedrugdetails');
Route::get('/Checkpatient',[DoctorController::class,'checkPage'])->name('Checkreturn');
Route::get('/FetchPatientData',[DoctorController::class,'FetchPatientData'])->name('FetchPatientData');

Route::post("/SaveRegister",[PatientController::class,'SavePatient'])->name('PatientRegister');
Route::post("/Filterbydate",[PatientController::class,'Filterpatientdata'])->name('Ajaxfilterdataofpatient');
Route::get('ViewHistory',[PatientController::class,'viewpage'])->name('PatientHistoryPage');
