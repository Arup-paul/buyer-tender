<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('backend.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $Validator = Validator::make($request->all(),[
            'p_name' =>'required',
            'p_price' =>'required',
            'p_color' =>'required',
            'p_image' =>'required',

           ]);
           if($Validator->fails()){
                  return redirect()->back()->withErrors($Validator)->withInput( );
           }
        $data = new Product();
        $data->p_name = $request->p_name;
        $data->p_price = $request->p_price;
        $data->p_color = $request->p_color;
        if ( $request->file( 'p_image' ) ) {
         $file = $request->file( 'p_image' );
         $filename = date( 'YmdHi' ) . $file->getClientOriginalName();
         $file->move( public_path( 'upload/product' ), $filename );
         $data['p_image'] = $filename;
       }
        $data->save();
        session()->flash( 'type', 'success' );
        session()->flash( 'msg', 'Product Added' );
        return redirect()->back();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
