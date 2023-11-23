<?php

namespace App\Http\Controllers;
use App\Models\service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\chatbox;
use Illuminate\Support\Facades\Validator;
class nurseController extends Controller
{

    function index()
    {
        if(Auth::check())
        {
            $service = service::all();
            $mess = chatbox::all();
            $user = Auth::user();
            if($user->role == 1 )
            {
                return view('admin.nurse.service.index', compact('service','mess','user'));
            }
            else if($user->role == 3 )
            {
                return view('fnurse.service.index', compact('service','mess','user'));
            } 
        }
        else
        {
            $user = "";
        }
        
        
    }
    function create()
    {
        if(Auth::check())
        {
            if(Auth::user()->role == 1 )
            {
                return view('admin.nurse.service.create');
            }
            else if(Auth::user()->role == 3 )
            {
                return view('fnurse.service.create');
            } 
        }
    }
    function postCreateSer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'price' =>'required|numeric|between:0,1000000000',
            
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $name = $request ->name;
        $price = $request ->price;
        //luu db
        $service = new service();
        $service ->ser_name = $name;
        $service ->ser_price = $price;
        $service ->save();
        if(Auth::user()->role == 1 )
        {
            return redirect('admin/nurse/service/index') -> with('status', "save succsess");
        }
        else if(Auth::user()->role == 3 )
        {
            return redirect('fnurse/service/index') -> with('status', "save succsess");
        }            
        
    }
    function edit($id)
    {
        if(Auth::check())
        {
            $mess = chatbox::all();
            $service = service::find($id);
            $user = Auth::user();
            if($user->role == 1 )
            {
                return view("admin.nurse.service.edit", compact('service','mess','user'));
            }
            else if($user->role == 3 )
            {
                return view("fnurse.service.edit", compact('service','mess','user'));
            } 
        }
    }
    function postEdit(Request $request)
    {
        $service = service::find($request -> id);
        $name = $request ->name;
        $price = $request->price;
        //luu db
        $service ->ser_name = $name;
        $service ->ser_price = $price;
        $service ->save();
        if(Auth::user()->role == 1 )
        {
            return redirect('admin/nurse/service/index') -> with('status', "Edit succsess");
        }
        else if(Auth::user()->role == 3 )
        {
            return redirect('fnurse/service/index') -> with('status', "Edit succsess");
        }      
    }
    function delete($id)
    {
        // Find the service by ID
        $service = service::find($id);
        // Delete the service and its related Product(s)
        $service->delete();
        if(Auth::user()->role == 1 )
        {
            return redirect('admin/nurse/service/index') -> with('status', "Delete succsess");
        }
        else if(Auth::user()->role == 3 )
        {
            return redirect('fnurse/service/index') -> with('status', "Delete succsess");
        }     
    }

}
