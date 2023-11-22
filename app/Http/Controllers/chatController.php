<?php

namespace App\Http\Controllers;

use App\Models\chatbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\task;
use Illuminate\Support\Facades\DB;

class chatController extends Controller
{
    
    function index(){
        if(Auth::check())
        {
            $user = Auth::user();
        }
        else
        {
            $user = "";
        }
        $mess = chatbox::all();
        return view('sidebar', compact('mess','user'));
    }

    function sendMess(Request $request){
        $name = $request -> name;
        $msg = $request -> msg;
        $mess = new chatbox();
        $mess ->name = $name;
        $mess -> mess = $msg;
        $mess ->save();
        return back();
    }

    function delMess(){
        if(Auth::check())
        {
            $user = Auth::user();
            $name = $user -> name;
            $deleted = DB::delete("delete from chatboxes where name = '$name'");
            return back();
        }
    }
    function cretask(Request $request){
        $task = new task();
        $task -> title = $request -> ttitle;
        $task -> day = $request -> tday;
        $task -> time = $request -> ttime;
        $task -> user_id = $request -> tuserid;
        $task ->save();
        $user = Auth::user();
        if($user->role == 1 )
        {
            return redirect('admin/home');
        }
        else if($user->role == 2 )
        {
            return redirect('fdoctor/home');
        }
        else if($user->role == 3 )
        {
            return redirect('fnurse/home');
        }
    }

    function upsta($id)
    {
        $task = Task::find($id);

        if ($task) {
            $task->update(['status' => "Done"]);

            return redirect('admin/home');
        }
    }
}
