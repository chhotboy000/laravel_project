<?php

namespace App\Http\Controllers;

use App\Models\treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\medicine;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
//use Illuminate\Pagination\PaginationServiceProvider;

class medicineController extends Controller
{
    function med_index(){
        if(Auth::check())
        {
            $user = Auth::user();
            $treatmed = treatment::where('status', 'waitMed')->orderBy('created_at', 'desc')->get();
            if( $user->role == 1 )
            {
                return view ('admin.pharma.treatmed', compact('user','treatmed'));
            }
            else if( $user->role == 5 )
            {
                return view('fpharma.treatmed', compact('user','treatmed'));
            }
        }
        else
        {
            $user = "";
        }
        
        
    }

    function med_finish($id){
        
            $med = DB::table('treatments')->where('id',$id)->update(['status' => 'pay']);
            $user = Auth::user();
            $pid = treatment::where('id',$id)->pluck('patient_id');
            $pa = DB::table('patients')->where('id',$pid)->update(['status' => 'doneMed']);
            $me = treatment::find($id);
            for($i=1;$i<11;$i++)
            {
                $mid = 'medi'.$i;
                $fre = 'frequency' .$i;
                $time = 'days' . $i;
                $medi = $me -> $mid;
                $mequ = medicine::where('id',$medi)->pluck('quantity')->first();
                $fr = $me -> $fre;
                $ti = $me -> $time;
                $old = $fr * $ti;
                $new = $mequ - $old;
                $nemequ = DB::table('medicines')->where('id',$medi)->update(['quantity' => $new]);
            }
             if( $user->role == 1 )
            {
                return redirect('admin/pharma/treatmed');
            }
            else if( $user->role == 5 )
            {
                return redirect('fpharma/treatmed');
            }
            
        
    }

    function ser_index(){
        if(Auth::check())
        {
            $user = Auth::user();
            $treatser = treatment::where('status', 'waitTes')->orderBy('created_at', 'desc')->get();
            if( $user->role == 1 )
            {
                return view ('admin.nurse.treatser_index', compact('user','treatser'));
            }
            else if( $user->role == 3 )
            {
                return view('fnurse.treatser_index', compact('user','treatser'));
            }
        }
        else
        {
            $user = "";
        }
    }

    function ser_finish($id){
        $med = DB::table('treatments')->where('id',$id)->update(['status' => 'doneTes']);
        $pid = treatment::where('id',$id)->pluck('patient_id');
        $pa = DB::table('patients')->where('id',$pid)->update(['status' => 'doneTes']);
        $user = Auth::user();
        if( $user->role == 1 )
        {
            return redirect('admin/nurse/treatser_index');
        }
        else if( $user->role == 3 )
        {
            return redirect('fnurse/treatser_index');
        } 
}

    function ser_postresult(Request $request){
        $trid = $request->trid;
        $file = $request->file('image');
        if ($file) {
            $filename = $file->getClientOriginalName();
            $file->move("img", $filename);

            // Update database record
            $tr = treatment::find($trid);
            $tr->result = $request->result;
            $tr->image = $filename;
            $tr->save();
        }
        
        $user = Auth::user();
        if( $user->role == 1 )
        {
            return redirect('admin/nurse/treatser_index');
        }
        else if( $user->role == 3 )
        {
            return redirect('fnurse/treatser_index');
        } 
    }

    function ser_result($id){
        $serres = treatment::find($id);
        $user = Auth::user();
        if( $user->role == 1 )
        {
            return view('admin.nurse.treatser_result',compact('serres'));
        }
        else if( $user->role == 3 )
        {
            return view('fnurse.treatser_result',compact('serres'));
        } 
    }
    
    function list()
    {
        if(Auth::check())
        {
            // $medi = medicine::all();
            $medi = medicine::sortable('id')->paginate(5);
            $user = Auth::user();
            if( $user->role == 1 )
            {
                return view('admin/pharma/medicine',compact('medi'));
            }
            else if( $user->role == 5 )
            {
                return view('fpharma/medicine',compact('medi'));
            } 
        }
    }
    function create()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if( $user->role == 1 )
            {
                return view ('admin/pharma/create');
            }
            else if( $user->role == 5 )
            {
                return view ('fpharma/create');
            } 
        }
        else
        {
            $user = "";
        }
        
    }
    function postCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'quantity' =>'required|numeric|between:0,10000',
            'price' =>'required|numeric|between:0,1000000000',
            'type' => 'required|regex:/^[a-zA-Z\s]+$/',
            'expire' =>'required|date',
            'import' =>'required|regex:/^[a-zA-Z\s]+$/',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
            // route('/pharma/postCreate') không tìm được route của nó
                ->withErrors($validator)
                ->withInput();
        }

        $name = $request ->name;
        $quantity = $request->quantity;
        $price = $request ->price;
        $type = $request ->type;
        $expire = $request ->expire;
        $import = $request ->import;
        //luu db
        $medicine = new medicine();
        $medicine ->name = $name;
        $medicine ->quantity = $quantity;
        $medicine ->price = $price;
        $medicine ->type = $type;
        $medicine ->expire = $expire;
        $medicine ->import = $import;

        $medicine ->save(); 
        
         if(Auth::check())
        {
            $user = Auth::user();
            if( $user->role == 1 )
            {
                return redirect('/admin/pharma/medicine') -> with('status', "save succsess");
            }
            else if( $user->role == 5 )
            {
                return redirect('fpharma/medicine') -> with('status', "save succsess");
            } 
        }          
    }
    function edit($id)
    {
        $medicine = medicine::find($id);
        $user = Auth::user();
        if( $user->role == 1 )
        {
            return view("admin.pharma.edit", compact('medicine'));
        }
        else if( $user->role == 5 )
        {
            return view("fpharma.edit", compact('medicine'));
        } 
    }
    function postEdit(Request $request)
    {
        $medicine = medicine::find($request -> id);
        $name = $request ->name;
        $quantity = $request->quantity;
        $price = $request ->price;
        $type = $request ->type;
        $expire = $request ->expire;
        $import = $request ->import;
        //luu db
        $medicine ->name = $name;
        $medicine ->quantity = $quantity;
        $medicine ->price = $price;
        $medicine ->type = $type;
        $medicine ->expire = $expire;
        $medicine ->import = $import;

        $medicine ->save(); 
        $user = Auth::user();
        if( $user->role == 1 )
        {
            return redirect('admin/pharma/medicine') -> with('status', "Edit succsess");
        }
        else if( $user->role == 5 )
        {
            return redirect('fpharma/medicine') -> with('status', "Edit succsess");
        }  
    }
    function delete($id)
    {
        // Find the service by ID
        $medicine = medicine::find($id);
        // Delete the service and its related Product(s)
        $medicine->delete();
        $user = Auth::user();
        if( $user->role == 1 )
        {
            return redirect('admin/pharma/medicine') -> with('status', "Delete succsess");
        }
        else if( $user->role == 5 )
        {
            return redirect('fpharma/medicine') -> with('status', "Delete succsess");
        }  
        
    }
//     public function getData()
// {
//     $data = medicine::paginate(5); // Fetch data using Eloquent and paginate the results
//     return response()->json($data);
// }

}
