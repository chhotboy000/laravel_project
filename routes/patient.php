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

Route::get('logout', [AuthController::class,'logout']);



Route::namespace('patient')->group(function () {
    Route::get('/', [homeController::class,'front']);
    Route::get('/fpatient/login', [AuthPatientController::class,'login']);
    Route::post('/fpatient/login', [AuthPatientController::class,'AuthPatientLogin']);

    });