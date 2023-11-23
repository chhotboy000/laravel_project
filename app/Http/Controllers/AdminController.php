<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\chatbox;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\schedule;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\User\AdminRequest;
use App\Http\Requests\User\EditAdminRequest;
use App\Models\service;
use validate;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $user = Auth::user();
        }
        else
        {
            $user = "";
        }
        $users = User::all();
        return view('admin.user.index', compact('users','user'));
    }

    function createAdmin(){
        if(Auth::check())
        {
            $user = Auth::user();
        }
        else
        {
            $user = "";
        }
        return view('admin.user.create', compact('user'));
    }
    function postCreateAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|max:16|confirmed',
            // 'role' => 'required|between:1,5',
            'din' => 'required|date',
            'dob' => [
                'required',
                'date',
                'before:'.now()->subYears(18)->format('Y-m-d'),
            ],
            'salary' =>'required|numeric|between:0,1000000000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $name = $request ->name;
        $email = $request ->email;
        $password = Hash::make($request->adpassword);
        $role = $request ->role;
        $spec = $request ->spec;
        $din = $request ->din;
        $dob = $request -> dob;
        $sal = $request -> salary;
        $user = new user();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->role = $role;
        $user->specialist = $spec;
        $user->dateIn = $din;
        $user->dob = $dob;
        $user->salary = $sal;
        $user -> save();
        return redirect('admin/user/index')->with('status','Create successful');
    }
    function edit($id){
        if(Auth::check())
        {
            $user = Auth::user();
        }
        else
        {
            $user = "";
        }
        $user = user::find($id);
        return view("admin.user.edit", compact('user'));
    }
    public function postEditAdmin($id, Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|regex:/^[a-zA-Z\s]+$/',
        'salary' =>'required|numeric|between:0,1000000000',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $user = User::find($id);
    if (!$user) {
        // Handle the case where the user with the given ID is not found
        return redirect()->back()->with('error', 'User not found');
    }

    $name = $request->name;
    $role = $request->role;
    $sal = $request->salary;
    $spec = $request->spec;

    $user->name = $name;
    $user->role = $role;
    $user->salary = $sal;
    $user->specialist = $spec;
    $user->save();

    $loggedInUser = Auth::user();
    if ($loggedInUser && $loggedInUser->role == 1) {
        return redirect('admin/user/index')->with('status', 'Update successful');
    } else {
        // Handle the case where the logged-in user is not an admin
        return redirect()->back()->with('error', 'You do not have permission to perform this action');
    }
}
    function delete($id)
    {

        $user = user::find($id);
        $user->delete();
        $user = Auth::user();
        if($user->role == 1 )
        {
            return redirect('admin/user/index')->with('status',"delete successfully");
        }
    }

    function schedule()
    {
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            $user = "";
        }
        $staff = User::all();
        return view('admin.schedule.creSche', compact('staff', 'user', ));
    }
    function postSche(Request $request)
    {
        for ($i = 1; $i < 8; $i++) {
            for ($j = 1; $j < 8; $j++) {
                $schedulemor = new Schedule();
                $schedulemor->day = $request->input('s' . $j . 'day' . $i);
                $schedulemor->time = $request->input('s' . $j . 'time' . $i);
                $schedulemor->job = $request->input('s' . $j . 'job' . $i);
                $schedulemor->user_id = $request->input('s' . $j . 'id' . $i);
                $schedulemor->scheid = $request->input('s' . $j . 'scheid' . $i);
                $schedulemor->save();
            }
        }
        for ($i = 1; $i < 8; $i++) {
            for ($j = 1; $j < 8; $j++) {
                $scheduleaft = new Schedule();
                $scheduleaft->day = $request->input('t' . $j . 'day' . $i);
                $scheduleaft->time = $request->input('t' . $j . 'time' . $i);
                $scheduleaft->job = $request->input('t' . $j . 'job' . $i);
                $scheduleaft->user_id = $request->input('t' . $j . 'id' . $i);
                $scheduleaft->scheid = $request->input('t' . $j . 'scheid' . $i);
                $scheduleaft->save();
            }
        }

        for ($i = 1; $i < 8; $i++) {
            for ($j = 1; $j < 8; $j++) {
                $scheduleeve = new Schedule();
                $scheduleeve->day = $request->input('c' . $j . 'day' . $i);
                $scheduleeve->time = $request->input('c' . $j . 'time' . $i);
                $scheduleeve->job = $request->input('c' . $j . 'job' . $i);
                $scheduleeve->user_id = $request->input('c' . $j . 'id' . $i);
                $scheduleeve->scheid = $request->input('c' . $j . 'scheid' . $i);
                $scheduleeve->save();
            }
        }

        return redirect('admin/home');
    }

    function editschedule()
    {
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            $user = "";
        }
        $staff = User::all();
        $tenMinutesAgo = Carbon::now()->subMinutes(1);
        Schedule::where('created_at', '<', $tenMinutesAgo)->delete();
        return view('admin.schedule.editSche', compact('staff', 'user', ));
    }

    function editSche(Request $request)
    {
        global $schid;
        $schid = 0;

        for ($i = 1; $i < 8; $i++) {
            for ($j = 1; $j < 8; $j++) {
                $newValue = $request->input('s' . $j . 'scheid' . $i);
                $schid = $schid + 1; // Tăng giá trị của $schid trước khi sử dụng
                Schedule::where('scheid', 'sche' . $schid)->update([ 'scheid' => $newValue, ]);

                $newValue = $request->input('t' . $j . 'scheid' . $i);
                $schid = $schid + 1; // Tăng giá trị của $schid trước khi sử dụng
                Schedule::where('scheid', 'sche' . $schid)->update([ 'scheid' => $newValue, ]);
                
                $newValue = $request->input('c' . $j . 'scheid' . $i);
                $schid = $schid + 1; // Tăng giá trị của $schid trước khi sử dụng
                Schedule::where('scheid', 'sche' . $schid)->update([ 'scheid' => $newValue, ]);
                
            }
        }
        $schid = 1;
        return redirect('home');
    }
}
