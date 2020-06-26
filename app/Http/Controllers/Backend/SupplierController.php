<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Supplier;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function view(){
        $data['data'] = Supplier::all();
        return view('backend.supplier.view_supplier',$data);
    }

    public function add(){
        return view('backend.supplier.add_supplier');
    }

    public function store(Request $request){

        $Validator = Validator::make($request->all(),[
            'name' =>'required|min:4',
            'mobile_no' =>'required',
            'email'=> 'required|email|unique:suppliers',
            'address'=>'required',
            'status'=>'required'
           ]);


           if($Validator->fails()){
                  return redirect()->back()->withErrors($Validator)->withInput( );
           }

        $data = new Supplier();
        $data->name = $request->name;
        $data->mobile_no = $request->mobile_no;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->status = $request->status;
        $data->save();
        session()->flash( 'type', 'success' );
        session()->flash( 'msg', 'Suppliers Added' );
        return redirect()->route('suppliers.view');
    }
}
