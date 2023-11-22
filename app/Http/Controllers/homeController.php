<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\chatbox;
use App\Models\schedule;
use App\Models\Event;
use App\Models\task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    public function front()
    {
        $event = event::all();
        return view('front.index', compact('event'));
    }
    public function index()
    {
        if(Auth::check())
        {
            $sche = schedule::all();
            $user = Auth::user();
            $sche = schedule::orderByDesc('created_at')->take(147)->get();
            $task = task::where('status','Not yet')->get();
            $eve = event::all();
            $taskcount = task::count();
            if($user->role == 1 )
            {
                return view('admin.home', compact('user','sche','task','eve','taskcount'));
            }
            else if($user->role == 2 )
            {
                return view('fdoctor.home', compact('user','sche','task','eve','taskcount'));
            }
            else if($user->role == 3 )
            {
                return view('fnurse.home', compact('user','sche','task','eve','taskcount'));
            }
            else if($user->role == 4 )
            {
                return view('frecept.home', compact('user','sche','task','eve','taskcount'));
            }
            else if($user->role == 5 )
            {
                return view('fpharma.home', compact('user','sche','task','eve','taskcount'));
            }
        }
        // return view('home');
    }
    public function getEvents()
    {
        $events = Event::all();

        return response()->json($events);
    }
    
}
