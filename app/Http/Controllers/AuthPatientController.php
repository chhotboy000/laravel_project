<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\AuthServiceProvider;
use App\Models\patient;


class AuthPatientController extends Controller
{
    public function guard()
    {
        return Auth::guards('patient');
    }
    public function login()
    {
        return view('fpatient.login');
    }
    public function AuthPatientLogin(Request $request)
    {

        $email = $request ->email;
        $password = $request ->password;
        if(Auth::guard('patient')->attempt(['email' => $email, 'password' => $password]))
        {
            return redirect('fpatient/index');
        }

        else
        {
            $error_message = 'Authentication failed: ' . $email . ' - ' . $password;
            return redirect()->back()->with('error', $error_message);
        }
    }
}

