<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('Create/Patient', [App\Http\Controllers\Patient::class, 'CreatePatient'])->name('create.patient');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/hospital', [App\Http\Controllers\Hospital::class, 'HospitalIndex'])->name('hospital_route');
Route::get('/patient', [App\Http\Controllers\Patient::class, 'PatientIndex'])->name('patient_route');
Route::get('/donar', [App\Http\Controllers\Donar::class, 'DonarIndex'])->name('donar_route');
Route::post('/homepatient', [App\Http\Controllers\Patient::class, 'storePatient'])->name('storePatient.class');
Route::post('/homedonar', [App\Http\Controllers\Donar::class, 'storeDonar'])->name('storeDonar.class');
Route::post('/homehospital', [App\Http\Controllers\Hospital::class, 'storeHospital'])->name('storeHospital.class');
Route::get('/donar/info', [App\Http\Controllers\Donar::class, 'checkDonarInfo'])->name('checkdonarinfo');
Route::get('/donar/infopage', [App\Http\Controllers\Donar::class, 'donarInfoPage'])->name('donar_info_page');
Route::get('/patient/info', [App\Http\Controllers\Patient::class, 'checkPatientInfo'])->name('checkpatientinfo');
Route::get('/patient/infopage', [App\Http\Controllers\Patient::class, 'patientInfoPage'])->name('patient_info_page');
Route::get('/donar/info', [App\Http\Controllers\Donar::class, 'checkDonarInfo'])->name('checkdonarinfo');
Route::get('/donar/infopage', [App\Http\Controllers\Donar::class, 'donarInfoPage'])->name('donar_info_page');
Route::get('/hospital/info', [App\Http\Controllers\Hospital::class, 'checkHospitalInfo'])->name('checkhospitalinfo');
Route::get('/hospital/infopage', [App\Http\Controllers\Hospital::class, 'hospitalInfoPage'])->name('hospital_info_page');
Route::post('/patient/info/update', [App\Http\Controllers\Patient::class, 'updatePatientInfo'])->name('patient_info_update');
Route::post('/donar/info/update', [App\Http\Controllers\Donar::class, 'updateDonarInfo'])->name('donar_info_update');
Route::post('/hospital/info/update', 'HospitalController@updateHospitalInfo')->name('hospital_info_update');
Route::get('/bloodrequest', [App\Http\Controllers\Hospital::class, 'bloodrequest'])->name('bloodrequest');
Route::get('/hospitalrating', [App\Http\Controllers\Hospital::class, 'hospitalrating'])->name('hospitalrating');
Route::post('/hospitalstats', [App\Http\Controllers\Hospital::class, 'hospitalstatistics'])->name('hospitalstatistics');
Route::get('/survey', [App\Http\Controllers\Hospital::class, 'survey'])->name('survey');
Route::get('/hospital-stats', [App\Http\Controllers\Hospital::class, 'showStatistics'])->name('hospital.stats');