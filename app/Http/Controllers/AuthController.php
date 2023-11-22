<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\patient;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            if(Auth::user()->role == 1 )
            {
                return redirect('admin/home');
            }
            else if(Auth::user()->role == 2 )
            {
                return redirect('fdoctor/home');
            }
            else if(Auth::user()->role == 3 )
            {
                return redirect('fnurse/home');
            } 
            else if(Auth::user()->role == 4 )
            {
                return redirect('frecept/home');
            } 
            else if(Auth::user()->role == 5 )
            {
                return redirect('fpharma/home');
            }      
        }else{
             // Đăng nhập thất bại
        $error_message = 'Email or Password is incorrect!! Please re-enter.' ;
        return redirect()->back()->with('error', $error_message);

        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
    // public function AuthLogin(Request $request)
    // {
    //     $email = $request ->email;
    //     $password = $request ->password;
        
    //     if(Auth::attempt(['email' => $email, 'password' => $password]))
    //     {
    //         if(Auth::user()->role == 1 )
    //         {
    //             return redirect('admin/home');
    //         }
    //         else if(Auth::user()->role == 2 )
    //         {
    //             return redirect('fdoctor/home');
    //         }
    //         else if(Auth::user()->role == 3 )
    //         {
    //             return redirect('fnurse/home');
    //         } 
    //         else if(Auth::user()->role == 4 )
    //         {
    //             return redirect('frecept/home');
    //         } 
    //         else if(Auth::user()->role == 5 )
    //         {
    //             return redirect('fpharma/home');
    //         }      
    //     }
    //     // else if(Auth::guard('patient')->attempt(['email' => $email, 'password' => $password]))
    //     //     {
    //     //         return redirect('admin/home');
    //     //     }
    //     else
    //     {
    //         $error_message = 'Authentication failed: ' . $email . ' - ' . $password;
    //         return redirect()->back()->with('error', $error_message);
    //     }
    // }
}
