<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\supplierproduct;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TenderController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data              = [];
        $role              = 3;
        $data['products']  = Product::all();
        $data['suppliers'] = User::where( 'role', $role )->get();
        return view( 'backend.tender.index', $data );
    }

    public function TenderDetails() {
        $data               = [];
        $data['tenderlist'] = DB::table( 'orders' )
            ->join( 'users', 'orders.supplier_id', 'users.id' )
            ->select( 'users.*', 'orders.*' )
            ->where( 'order_status', 'pending' )
            ->get();
        return view( 'backend.tender.details', $data );
    }

    public function BuyerOrderDetails() {
        $data               = [];
        $data['tenderlist'] = DB::table( 'supplierproducts' )
            ->join( 'users', 'supplierproducts.user_id', 'users.id' )
            ->select( 'users.*', 'supplierproducts.*' )
            ->get();
        return view( 'backend.tender.buyerorderproductlist', $data );
    }

    public function viewTender( $id ) {
        $data          = [];
        $data['order'] = DB::table( 'orders' )
            ->join( 'users', 'orders.user_id', 'users.id' )
            ->select( 'orders.*', 'users.*' )
            ->where( 'orders.id', $id )
            ->first();

        $data['order_details'] = DB::table( 'orderdetails' )
            ->join( 'products', 'orderdetails.product_id', 'products.id' )
            ->select( 'orderdetails.*', 'products.*' )
            ->where( 'order_id', $id )
            ->get();

        return view( 'backend.tender.detailstender', $data );

    }

    public function supplierOrdered( Request $request ) {

        $Validator = Validator::make( $request->all(), [
            'product_name' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'total_price' => 'required',

        ] );
        if ( $Validator->fails() ) {
            return redirect()->back()->withErrors( $Validator )->withInput();
        }

        // $insert = DB::table( 'supplierproducts' )
        //      ->insert( array(
        //             'product_name' => $request->product_name,
        //             'product_price' => $request->product_price,
        //             'product_quantity' => $request->product_quantity,
        //             'total_price' => $request->total_price,
        //         )  ) ;

        $query = array(
            array(
                'product_name' => $request->product_name,
                'user_id' => $request->user_id,
                'product_price' => $request->product_price,
                'product_quantity' => $request->product_quantity,
                'total_price' => $request->total_price,
            )


        );



        $insert = DB::table( 'supplierproducts' )->insert( $query );

        if ( $insert ) {
            session()->flash( 'type', 'success' );
            session()->flash( 'msg', 'Submit quotation ' );
            return redirect()->back();
        }

        // $data                   = new supplierproduct();
        // $data->product_name     = $request->product_name;
        // $data->product_price    = $request->product_price;
        // $data->product_quantity = $request->product_quantity;
        // $data->total_price      = $request->total_price;
        // $data->save();
        // session()->flash( 'type', 'success' );
        // session()->flash( 'msg', 'Submit quotation ' );
        // return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        //
    }
}
