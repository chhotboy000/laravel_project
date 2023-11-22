<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\chatbox;
use App\Models\medicine;
use App\Models\patient;
use App\Models\schedule;
use App\Models\service;
use App\Models\treatment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use paginate;
use App\Http\Requests\Doctor\DoctorRequest;
use App\Http\Requests\Doctor\EditDoctorRequest;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{

    function index()
    {
        if (Auth::check()) {
            $patients = patient::where('status', 'waitExam')->orderBy('created_at', 'asc')->get();
            $treatment = treatment::all();
            $waitpa= patient::where('status', 'doneTes')->orderBy('created_at', 'asc')->get();
            $user = Auth::user();
            if($user->role == 1 )
            {
                return view('admin.doctor.index', compact('treatment', 'patients', 'user','waitpa'));
            }
            else if($user->role == 2 )
            {
                $docid = $user->id; // Assuming $user object contains the current user's ID.

                $patients = DB::table('patients')->where('status', 'waitExam') // Query the 'patients' table where status is 'waitExam'
                   ->where('doctor', $docid) // Match the 'doctor' column with the current user's ID
                   ->orderBy('created_at', 'asc') // Order the results by the 'created_at' column in ascending order
                   ->get();
                return view('fdoctor.index', compact('treatment', 'patients', 'user','waitpa'));
            } 
        } else {
            $user = "";
        }

    }

    function createTreat($id)
    {
        $patient = patient::find($id);
        $patient -> status = "Examing";
        $patient -> save();
        $service = service::all();
        $medicine = medicine::all();
        $me = medicine::all();
        if (Auth::check()) {
            $user = Auth::user();
            if($user->role == 1 )
            {
                return view('admin.doctor.createTreat', compact('patient', 'user','service','medicine', 'me'));
            }
            else if($user->role == 2 )
            {

                return view('fdoctor.createTreat', compact('patient', 'user','service','medicine'));
            } 
        } else {
            $user = "";
        }
        
        
    }

    function postCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'height' => 'required|numeric|between:0,250',
            'weight' =>'required|numeric|between:0,200',
            'blood' =>'required|numeric|between:0,200',
            'temp' => 'required|numeric|between:0,100',

        ]);


        if ($validator->fails()) {
            return redirect()->back()
            // route('/pharma/postCreate') không tìm được route của nó
                ->withErrors($validator)
                ->withInput();
        }
        $tr = new treatment();
        for($i = 1; $i < 11; $i++){
            $med = 'medi' . $i;
            $fre = 'frequency' .$i;
            $time = 'time' . $i;
            $day = 'days' . $i;
            $tr -> $med = $request -> $med;
            $tr -> $fre = $request -> $fre;
            $tr -> $time = $request -> $time;
            $tr -> $day = $request -> $day;
            
        }
        for($i=2;$i<11;$i++){
            $test = 'test' . $i;
            $tr -> $test = $request -> $test;
            
        }
        $tr->test1 = "1";
        $tr -> weight = $request -> weight;
        $tr -> height = $request -> height;
        $tr -> blood = $request -> blood;
        $tr -> temp = $request -> temp;
        $tr -> note = $request -> note;
        $tr -> dateReExam = $request -> dateReExam;
        $tr -> patient_id = $request -> patient_id;

        $med1=$request->medi1;
        $tes2=$request->test2;
        if($med1 != null){
            $tr -> status = 'waitMed';  
        }
        if($tes2 !=null){
            $tr -> status = 'waitTes';
        }
        $tr -> save();
        if (Auth::check()) {
            $user = Auth::user();
            if($user->role == 1 )
            {
                return redirect('admin/doctor/index')->with('status', 'Examination successful');
            }
            else if($user->role == 2 )
            {
                return redirect('fdoctor/index')->with('status', 'Examination successful');
            } 
        }
    }

    function editTreat($id)
    {
        $mess = chatbox::all();
        $patient = patient::all();
        $treat = treatment::find($id);
        $service = service::all();
        $medicine = medicine::all();
        $me = medicine::all();
        if (Auth::check()) {
            $user = Auth::user();
            if($user->role == 1 )
            {
                return view("admin.doctor.editTreatment", compact('treat', 'patient', 'mess', 'user','service','medicine','me'));
            }
            else if($user->role == 2 )
            {
                return view("fdoctor.editTreatment", compact('treat', 'patient', 'mess', 'user','service','medicine'));
            } 
        } else {
            $user = "";
        }
        
        
    }

    function postTreat(Request $request)
    {
        $tr = treatment::find($request->id);
        if($tr !== null)
        {
            for($i = 1; $i < 11; $i++){
                $med = 'medi' . $i;
                $fre = 'frequency' .$i;
                $time = 'time' . $i;
                $day = 'days' . $i;
                //$medi = $request -> $med;
                //$tr -> $med = $medi;
                //$tr->$med = $request->input($med) ?? $tr->$med;
                // if($tr->$med == null){
                    $tr -> $med = $request -> $med;
                    $tr -> $fre = $request -> $fre;
                    $tr -> $time = $request -> $time;
                    $tr -> $day = $request -> $day;
                // }
            }
            for($i=2;$i<11;$i++){
                $test = 'test' . $i;
                if($tr -> $test == null){
                $tr -> $test = $request -> $test;
                }
            }
            $tr->test1=$request->test1;
            $tr -> weight = $request -> weight;
            $tr -> height = $request -> height;
            $tr -> blood = $request -> blood;
            $tr -> temp = $request -> temp;
            $tr -> note = $request -> note;
            $tr -> dateReExam = $request -> dateReExam;
            $tr -> patient_id = $request -> patient_id;
            $tr -> status = 'waitMed';
            $tr -> save();
            $paid=$request->patient_id;
            $pa = DB::table('patients')->where('id',$paid)->update(['status' => 'done']);
        }
        if (Auth::check()) {
            $user = Auth::user();
            if($user->role == 1 )
            {
                return redirect('/admin/doctor/index')->with('status', 'change examination successful');
            }
            else if($user->role == 2 )
            {
                return redirect('/fdoctor/index')->with('status', 'change examination successful');
            } 
        }
        
    }
}