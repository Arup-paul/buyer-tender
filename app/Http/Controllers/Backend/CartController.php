<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Orderdetail;
use App\Model\Supplier;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller {
    public function index( Request $request ) {
        $data           = array();
        $data['id']     = $request->id;
        $data['name']   = $request->name;
        $data['qty']    = $request->qty;
        $data['price']  = $request->price;
        $data['weight'] = $request->weight;

        $add = Cart::add( $data );
        if ( $add ) {
            session()->flash( 'type', 'success' );
            session()->flash( 'msg', 'Product Added' );
            return Redirect()->back();
        } else {

            session()->flash( 'type', 'error' );
            session()->flash( 'msg', 'Invalid' );
            return Redirect()->back();
        }

    }

    public function CreateTender( Request $request ) {
        $request->validate( [
            'supplier_id' => 'required',
        ],
            [
                'supplier_id.required' => 'Select a Supplier ',
            ] );

        $data             = [];
        $supplier_id      = $request->supplier_id;
        $data['supplier'] = User::where( 'id', $supplier_id )->first();
        $data['contents'] = Cart::content();
        return view( 'backend.tender.list', $data );

    }

    public function FinalTender( Request $request ) {

        $data                   = array();
        $data['supplier_id']    = $request->supplier_id;
        $data['user_id']    = $request->user_id;
        $data['order_date']     = $request->order_date;
        $data['order_status']   = $request->order_status;
        $data['total_products'] = $request->total_products;


        // $order_id = DB::table('orders')->insertGetId($data);
        $order_id = Order::insertGetId( $data );
        $contents = Cart::content();

        $odata = array();
        foreach ( $contents as $content ) {
            $odata['order_id']   = $order_id;
            $odata['product_id'] = $content->id;
            $odata['quantity']   = $content->qty;
            $insert              = Orderdetail::insert( $odata );
            // $insert = DB::table('orders_details')->insert($odata);
        }
        if ( $insert ) {
            session()->flash( 'type', 'success' );
            session()->flash( 'msg', 'Tender Generate' );
            Cart::destroy();
            return Redirect()->route( 'tender.index' );
        } else {
            session()->flash( 'type', 'error' );
            session()->flash( 'msg', 'error' );
            return Redirect()->back();

        }

    }
}
