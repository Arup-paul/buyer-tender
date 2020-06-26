@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tender</li>
      </ol>
    </section>


    <div class="content">

        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Buyer Tender   </h3>

           @if(session()->has('msg'))
           <div class="alert alert-{{session('type')}}">
               {{session('msg')}}
           </div>
       @endif
            <!-- /.box-header -->

            <div class="box-body">
                   <div class="row">
                       <div class="col-md-5">
                    <div class="panel">


                        <div class="price_card text-center">
                            <ul class="price-features" style="border:1px solid #ddd;">
                                <table class="table">
                                    <thead class="bg-info">
                                        <tr>
                                           <th class="text-white">Name</th>
                                           <th class="text-white">Qty</th>
                                        </tr>
                                    </thead>
                                    <br>
                                    <tbody>
                                     @php
                                         $cart_product = Cart::content();
                                        @endphp
                                         @foreach($cart_product as $product)
                                        <tr>

                                        <td>{{$product->name}}</td>
                                            <td>
                                            <form action="{{url('/cart-update-pos/'.$product->rowId)}}" method="post">
                                                @csrf
                                               <input type="number" style="width:40px;" name="qty" value="{{$product->qty}}">
                                                <button type="submit" class="btn btn-sm btn-success" style="margin-top:-6px;" ><i class="md md-check"></i></button>
                                               </form>
                                            </td>


                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </ul>
                            <div class="pricing-header bg-primary">


                            <form action="{{route('create-tender')}}" method="post">
                                @csrf

                                <div class="panel"> <br>
                                     @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                  @endif
                                    <h4 class="text-info pull-left"> Select Supplier</h4>


                                    <select name="supplier_id" class="form-control">
                                           <option disable="" selected="" value=""  >Select a Supplier</option>

                                           @foreach($suppliers as $supplier)
                                           <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                           @endforeach
                                    </select>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Create A Tender</button>

                        </div> <!-- end Pricing_card -->
                    </div>
                       </div>
                <div class="col-md-7">
                     <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Product Id</th>
                  <th>Product Name</th>
                  <th>Product Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($products as $key => $product)
              <tr>
                  <form action="{{route('tender.add-cart')}}" method="post">
                                @csrf


                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <input type="hidden" name="name" value="{{$product->p_name}}">
                                    <input type="hidden" name="qty" value="1">
                                    <input type="hidden" name="price" value="{{$product->p_price}}">
                                    <input type="hidden" name="weight" value="0">

                                  <td>{{$product->id}}</td>
                                  <td>{{$product->p_name}}</td>
                                  <td>
                                 <img src="{{URL::to('upload/product/'.$product->p_image)}}" width="30px" alt="">
                                 </td>
                                 <td><button type="submit" class="btn btn-sm btn-info">+</button></td>
                                                </form>

                            </tr>
              @endforeach


                </tfoot>
              </table>
                </div>
            </div>

            </div>
            <!-- /.box-body -->
          </div>

    </div>
    </div>



  @endsection
