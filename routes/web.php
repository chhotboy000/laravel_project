<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\nurseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\chatController;
use App\Http\Controllers\AuthPatientController;
use App\Http\Controllers\billController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\medicineController;

use App\Models\patient;
use Illuminate\Support\Facades\Auth;
use Doctrine\DBAL\Driver\Middleware;
use Illuminate\Auth\Events\Verified;

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
Route::get('/', [homeController::class,'front']);
Route::get('/login', [AuthController::class,'login']);
Route::post('/login', [AuthController::class,'AuthLogin']);

Route::get('/fpatient/login', [AuthPatientController::class,'login']);
Route::post('/fpatient/login', [AuthPatientController::class,'AuthPatientLogin']);
Route::get('logout', [AuthController::class,'logout']);


Route::get('/event', [EventController::class, 'index']);
Route::post('/event/action', [EventController::class, 'action']);
Route::post('/cretask', [chatController::class,'cretask']);
Route::get('/task/upd/{id}', [chatController::class,'upsta']);

Route::get('/sidebar', [chatController::class,'index']);
Route::get('pdf',[billController::class,'index']);



Route::prefix('admin')->middleware('admin')->group( function(){
    Route::get('/home', [homeController::class, 'index']);
    //event
    Route::get('/creEvent', [EventController::class, 'index']);
    Route::post('/event/action', [EventController::class, 'action']);
    //nurse
    Route::get('/nurse/service/index', [nurseController::class,'index']);
    Route::get('/nurse/service/create', [nurseController::class,'create']);
    Route::post('/nurse/service/postCreateSer', [nurseController::class,'postCreateSer']);
    Route::get('/nurse/service/edit/{id}', [nurseController::class,'edit']);
    Route::post('/nurse/service/postEdit', [nurseController::class,'postEdit']);
    Route::get('/nurse/service/delete/{id}', [nurseController::class,'delete']);

    Route::get('/nurse/treatser_index', [medicineController::class,'ser_index']);
    Route::get('/nurse/treatser/ser_finish/{id}', [medicineController::class,'ser_finish']);

    Route::get('/nurse/treatser/ser_result/{id}', [medicineController::class,'ser_result']);
    Route::post('/nurse/treatser/ser_postresult', [medicineController::class,'ser_postresult']);
    //doctor
    Route::get('/doctor/index', [DoctorController::class,'index']);
    
    Route::get('/doctor/createTreat/{id}', [DoctorController::class,'createTreat']);
    Route::post('/doctor/postCreate', [DoctorController::class,'postCreate']);

    Route::get('/doctor/editTreat/{id}', [DoctorController::class,'editTreat']);
    Route::post('/doctor/postTreat', [DoctorController::class,'postTreat']);

    //user
    Route::get('/user/index', [AdminController::class,'index']);
    Route::get('/user/create', [AdminController::class,'createAdmin']);
    Route::post('/user/postCreate', [AdminController::class,'postCreateAdmin']);
    Route::get('/user/edit/{id}', [AdminController::class,'edit']);
    Route::post('/user/postEditAdmin/{id}', [AdminController::class,'postEditAdmin']);
    Route::get('/user/delete/{id}', [AdminController::class,'delete']);

    //patient
    Route::get('/patient/index', [PatientController::class,'index']);
    Route::get('/patient/create', [PatientController::class,'createPatient']);
    Route::post('/patient/postCpatient', [PatientController::class,'postCreatePatient']);
    Route::get('/patient/update/{id}', [PatientController::class,'edit']);
    Route::post('/patient/postEditPatient', [PatientController::class,'postEditPatient']);
    Route::get('/patient/delete/{id}', [PatientController::class,'delete']);
    Route::get('/patient/createExam/{id}', [PatientController::class,'createReExam']);
    Route::post('/patient/postReExam', [PatientController::class,'postReExam']);
    Route::get('/patient/search', [PatientController::class,'filterPatients']);
    
    //Schedule
    Route::get('/schedule/creSche', [AdminController::class,'schedule']);
    Route::post('/schedule/postSche', [AdminController::class,'postSche']);
    Route::get('/schedule/editSche', [AdminController::class,'schedule']);
    Route::post('/schedule/editSche', [AdminController::class,'editSche']);

    //checkout
    Route::get('/recept/index', [billController::class,'index']);
    Route::post('/recept/confirm/{id}', [billController::class,'confirm']);
    Route::get('/recept/finish', [billController::class,'finish']);
    Route::get('/recept/filter', [billController::class,'filterByDay']);


    //pharma
    Route::get('/pharma/medicine', [medicineController::class,'list']);
    Route::get('/pharma/treatmed', [medicineController::class,'med_index']);
    Route::get('/pharma/treatmed/med_finish/{id}', [medicineController::class,'med_finish']);

    Route::get('/pharma/create', [medicineController::class,'create']);
    Route::post('/pharma/postCreate', [medicineController::class,'postCreate']);
    
    Route::get('/pharma/edit/{id}', [medicineController::class,'edit']);
    Route::post('/pharma/postEdit', [medicineController::class,'postEdit']);
    Route::get('/pharma/delete/{id}', [medicineController::class,'delete']);

    //Route::get('/pharma/getMed', [medicineController::class,'getData'])->name('admin.pharma.getMed');
});

Route::prefix('fnurse')->middleware('nurse')->group( function(){
    Route::get('/home', [homeController::class, 'index']);

    Route::get('/service/index', [nurseController::class,'index']);
    Route::get('/service/create', [nurseController::class,'create']);
    Route::post('/service/postCreateSer', [nurseController::class,'postCreateSer']);
    Route::get('/service/edit/{id}', [nurseController::class,'edit']);
    Route::post('/service/postEdit', [nurseController::class,'postEdit']);
    Route::get('/service/delete/{id}', [nurseController::class,'delete']);

    Route::get('/treatser_index', [medicineController::class,'ser_index']);
    Route::get('/ser_finish/{id}', [medicineController::class,'ser_finish']);

    Route::get('/ser_result/{id}', [medicineController::class,'ser_result']);
    Route::post('/ser_postresult', [medicineController::class,'ser_postresult']);
});

Route::prefix('fdoctor')->middleware('doctor')->group( function(){
    Route::get('/home', [homeController::class, 'index']);
    Route::get('/index', [DoctorController::class,'index']);
 
    Route::get('/createTreat/{id}', [DoctorController::class,'createTreat']);
    Route::post('/postCreate', [DoctorController::class,'postCreate']);

    Route::get('/editTreat/{id}', [DoctorController::class,'editTreat']);
    Route::post('/postTreat', [DoctorController::class,'postTreat']);

    Route::get('/delete/{id}', [DoctorController::class,'delete']);
});

Route::prefix('fpharma')->middleware('pharmacist')->group( function(){
    Route::get('/home', [homeController::class, 'index']);
    Route::get('/medicine', [medicineController::class,'list']);
    Route::get('/treatmed', [medicineController::class,'med_index']);
    Route::get('/treatmed/med_finish/{id}', [medicineController::class,'med_finish']);

    Route::get('/create', [medicineController::class,'create']);
    Route::post('/postCreate', [medicineController::class,'postCreate']);
    
    Route::get('/edit/{id}', [medicineController::class,'edit']);
    Route::post('/postEdit', [medicineController::class,'postEdit']);
    Route::get('/delete/{id}', [medicineController::class,'delete']);
});

Route::prefix('frecept')->middleware('recept')->group(function () {
    //NV
    Route::get('/patient/index', [PatientController::class,'index']);
    Route::get('/patient/create', [PatientController::class,'createPatient']);
    Route::post('/patient/postCpatient', [PatientController::class,'postCreatePatient']);
    Route::get('/patient/update/{id}', [PatientController::class,'edit']);
    Route::post('/patient/postEditPatient', [PatientController::class,'postEditPatient']);
    Route::get('/patient/delete/{id}', [PatientController::class,'delete']);
    Route::get('/patient/createExam/{id}', [PatientController::class,'createReExam']);
    Route::post('/patient/postReExam', [PatientController::class,'postReExam']);
    Route::get('/patient/search', [PatientController::class,'filterPatients']);
    
    //home
    Route::get('/home', [homeController::class, 'index']);
    //thanh toan
    Route::get('/index', [billController::class,'index']);
    Route::post('/confirm/{id}', [billController::class,'confirm']);
    Route::get('/finish', [billController::class,'finish']);
    Route::get('/filter', [billController::class,'filterByDay']);

});

Route::prefix('fpatient')->group( function(){
    Route::get('/index', [PatientController::class,'front']);
    Route::get('/view', [PatientController::class,'history']);
    Route::get('/updatePass', [PatientController::class,'ChangePass']);
    Route::post('/postUpdatePass', [PatientController::class,'postUpdatePass']);
});