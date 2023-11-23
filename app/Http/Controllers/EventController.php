<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\chatbox;

class EventController extends Controller
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
        $mess = chatbox::all();
        return view('/admin/creEvent', compact('mess','user'));
    }

    public function action(Request $request)
    {
    	$eve = new Event();
        $eve -> title = $request -> etitle;
        $eve -> day = $request -> eday;
        $eve -> time = $request -> etime;
        $eve ->save();
        $user = Auth::user();
        if($user->role == 1 )
        {
            return redirect('admin/home', compact('eve'));
        }
        else if($user->role == 2 )
        {
            return redirect('fdoctor/home', compact('eve'));
        }
        else if($user->role == 3 )
        {
            return redirect('fnurse/home', compact('eve'));
        }
    }
}
