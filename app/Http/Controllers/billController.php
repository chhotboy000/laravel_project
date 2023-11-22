<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\patient;
use Illuminate\Support\Facades\Auth;
use App\Models\treatment;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class billController extends Controller
{
    function index()
    {
        $user = Auth::user();
        $patient = patient::all();
        $treatment = treatment::all();
        $bill = treatment::where('status', 'pay')->orWhere('status','doneTest')->orderBy('created_at', 'desc')->get();
        
        if($user->role == 1)
        {
            return view ('admin.recept.index', compact('user','bill','patient', 'treatment'));
        }
        else if($user->role == 4)
        {
            return view ('frecept.index', compact('user','bill','patient', 'treatment'));
        }
    }
    function confirm(Request $request)
    {
        $id = $request -> id;
        $ser_price = $request -> totalServicePrice;
        $med_price = $request -> totalMedicinePrice;
        $total = $request -> total;
        $treat_id = $request -> treatment_id;
        $bill = new bill();
        $bill ->ser_price = $ser_price;
        $bill ->med_price = $med_price;
        $bill -> treatment_id = $treat_id;
        $bill -> patient_id = $request -> patient_id;
        $bill ->total =$total;
        $bill ->save();
        $pati=$request->patient_id;
        DB::table('patients')->where('id', $pati) ->update(['status' => 'finishExam']);
        DB::table('treatments')->where('id', $treat_id) ->update(['status' => 'finish']);
        $patient = patient::where('id', $bill -> patient_id = $request -> patient_id)->get();
        $treatment = treatment::where('id', $bill -> treatment_id = $request -> treatment_id)->get();
        
        $data = [
            'title' => 'Invoice of TuTam Hospital',
            'date' => date('m/d/Y'),
            'patient' => $patient,
            'bill' => $bill,
            'treatment' =>$treatment,
        ]; 
        $pdf = PDF::loadView('invoice', $data)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('invoice.pdf');
        $user = Auth::user();
        if($user->role == 1)
        {
            return redirect ('admin/recept/index',)->with('status', 'confirm success');
        }
        else if($user->role == 4)
        {
            return redirect ('frecept/index',)->with('status', 'confirm success');
        }
        
    }
    function finish()
    {
        $user = Auth::user();
        $patient = patient::all();
        $treatment = treatment::all();
        $bill = treatment::where('status', 'finish')->orderBy('created_at', 'desc')->get();
        
        if($user->role == 1)
        {
            return view ('admin.recept.finish', compact('user','bill','patient', 'treatment'));
        }
        else if($user->role == 4)
        {
            return view ('frecept.finish', compact('user','bill','patient', 'treatment'));
        }
    }
    public function filterByDay(Request $request)
    {
        $beginday = $request->input('beginday');
        $endday = $request->input('endday');
        $patient = Patient::all();
    
        $query = Treatment::where('status', 'finish')
                          ->orderBy('created_at', 'desc');
    
        if ($beginday) {
            $query->where('created_at', '>=', $beginday);
        }
    
        if ($endday) {
            $query->where('created_at', '<=', $endday);
        }
    
        $bill = $query->get();
    
        $user = Auth::user();
        if ($user->role == 1) {
            return view('admin.recept.finish', compact('user', 'bill', 'patient'));
        } elseif ($user->role == 4) {
            return view('frecept.finish', compact('user', 'bill', 'patient'));
        }
    }
}
