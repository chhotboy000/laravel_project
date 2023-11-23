<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\chatbox;
use App\Models\patient;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\treatment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    function index(){
        if(Auth::check())
        {
            $pat = patient::where('status', 'Examing')->orderBy('created_at', 'asc')->get();
            $pa = patient::where('status', 'finishExam')->orderBy('created_at', 'asc')->get();
            $patients = patient::where('status', 'waitExam')->orderBy('created_at', 'asc')->get();
            $search = patient::all();

            $user = Auth::user();
            if($user->role == 1 )
            {
                return view('admin.patient.index', compact('patients','user','pat','pa','search'));
            }
            else if($user->role == 4)
            {
                return view('frecept.patient.index', compact('patients','user','pat','pa','search'));
            }
            else{
                return view('fpatient.index', compact('patients','user','pat','pa'));
            }

        }
       
        
    }

    function createPatient(){
        if(Auth::check())
        {
            $user = Auth::user();
            $doc= User::all();
            $spec = User::distinct()->get('specialist');
            if($user->role == 1 )
            {
                return view('admin.patient.create', compact('user','doc','spec'));
            }
            else if($user->role == 4 )
            {
                return view('frecept.patient.create', compact('user','doc','spec'));
            } 
        }

    }
    function postCreatePatient(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:users',
            'pass' => 'required|min:3|max:16',
            'phone' => 'required|between:9,12',
            'add' => [
                'required',
                'regex:/^[\pL\s\d\pP]+$/u', // Dấu câu và ký tự đặc biệt được bao gồm ở đây (\pP).
            ],
            'dob' => [
                'required',
                'date',
                'before_or_equal:' . Carbon::now()->format('Y-m-d'),
            ],
            'sym' =>'required|regex:/^[a-zA-Z\s]+$/',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $name = $request ->name;
        $email = $request ->email;
        $pass = Hash::make($request ->pass);
        $phone = $request ->phone;
        $address = $request ->add;
        $gender = $request ->sex;
        $dob = $request ->dob;
        $symtomps = $request ->sym;
        $patient = new patient();
        $patient->name = $name;
        $patient->email = $email;
        $patient->password = $pass;
        $patient->phone = $phone;
        $patient->address = $address;
        $patient->gender = $gender;
        $patient->dob = $dob;
        $patient->symtomp = $symtomps;
        $patient->doctor = $request ->doctor;
        $patient -> save();
        $user = Auth::user();
       
        if($user->role == 1 )
            {
                return redirect('admin/patient/index')->with('status','Create successful');
            }
            else if($user->role == 4 )
            {
                return redirect('frecept/patient/index')->with('status','Create successful');
            } 
        
    }

    function edit($id)
    {
        if(Auth::check())
        {
            $patient = patient::find($id);
            $user = Auth::user();
            if($user->role == 1 )
            {
                return view("admin.patient.update", compact('patient','user'));
            }
            else if($user->role == 4 )
            {
                return view("frecept.patient.update", compact('patient','user'));
            }
        // return view("brand.update", compact('brand','mess','user'));
        }
    }
    function delete($id)
    {
        $patient = patient::find($id);
        $patient->delete();
        $user = Auth::user();
        if($user->role == 1 )
        {
            return redirect('admin/patient/index')->with('status',"delete successfully");
        }
        else if($user->role == 4 )
        {
            return redirect('frecept/patient/index')->with('status',"delete successfully");
        }   
    }

    function postEditPatient(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'phone' => 'required|between:9,12',
            'add' => [
                'required',
                'regex:/^[\pL\s\d\pP]+$/u', // Dấu câu và ký tự đặc biệt được bao gồm ở đây (\pP).
            ],
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $patient = patient::find($request->id);
        $name = $request ->name;
        $phone = $request ->phone;
        $address = $request ->add;
        $gender = $request ->sex;

        //$patient = new patient();
        $patient->name = $name;
        $patient->phone = $phone;
        $patient->address = $address;
        $patient->gender = $gender;
        $patient -> save();
        $user = Auth::user();
        if($user->role == 1 )
        {
            return redirect('admin/patient/index')->with('status','Update successful');
        }
        else if($user->role == 4 )
        {
            return redirect('frecept/patient/index')->with('status','Update successful');
        }    
    }
    function front()
    {
        return view('fpatient.index');
    }
    function history()
    {
        if (Auth::guard('patient')->check()) {
            $user = Auth::guard('patient')->user(); // Retrieve the authenticated patient
            $patient = Patient::find($user->id);
            $bill = treatment::where('patient_id', $patient->id)->get();
            return view('fpatient.view', compact('bill'));
        } 
    }

    function createReExam($id){
        if(Auth::check())
        {
            $user = Auth::user();
            $doc= User::all();
            $spec = User::distinct()->get('specialist');
            $pa = patient::find($id);
            if($user->role == 1 )
            {
                return view('admin.patient.createExam', compact('user','doc','spec','pa'));
            }
            else if($user->role == 4 )
            {
                return view('frecept.patient.createExam', compact('user','doc','spec','pa'));
            } 
        }

    }
    function postReExam(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'sym' =>'required|regex:/^[a-zA-Z\s]+$/',
        // ]);
        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        $id = $request->id;
        $patient = patient::find($id);
        $patient->symtomp = $request->psym;
        $patient->doctor = $request ->doctor;
        $patient->status = "waitExam";
        $patient -> save();
        $user = Auth::user();
        if($user->role == 1 )
            {
                return redirect('admin/patient/index')->with('status','Create successful');
            }
            else if($user->role == 4 )
            {
                return redirect('frecept/patient/index')->with('status','Create successful');
            } 
    }
    public function filterPatients(Request $request)
    {
        $searchQuery = $request->input('search');
        $pat = patient::where('status', 'Examing')->orderBy('created_at', 'asc')->get();
        $pa = patient::where('status', 'finishExam')->orderBy('created_at', 'asc')->get();
        $patients = patient::where('status', 'waitExam')->orderBy('created_at', 'asc')->get();
        $search = Patient::where('name', 'like', '%' . $searchQuery . '%')
                                  ->orWhere('phone', 'like', '%' . $searchQuery . '%')
                                  ->get();
    

        $user = Auth::user();
        if($user->role == 1 )
            {
                return view('admin.patient.index', compact('pa','patients', 'pat','search'));
            }
            else if($user->role == 4 )
            {
                return view('frecept.patient.index', compact('pa','patients', 'pat','search'));
            } 
    }

    // Update Password
    public function ChangePass()
    {
        if (Auth::guard('patient')->check()) {
            $user = Auth::guard('patient')->user(); // Retrieve the authenticated patient
            $patient = Patient::find($user->id);
            return view('fpatient.updatePass', ['patient' => $patient]);
        } 

    }

    public function postUpdatePass(Request $request)
    {
        if (Auth::guard('patient')->check()) {
            $user = Auth::guard('patient')->user(); // Retrieve the authenticated patient
            $patient = Patient::find($user->id);
            if (Hash::check($request->current_password, $patient->password)) {
                $patient->update([
                    'password' => Hash::make($request->new_password),
                ]);     
                return redirect('fpatient/index')->with('cuccess',"update password successfully");
            }
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        } 
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        
    }
       
}