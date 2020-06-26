@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Buyer Order Tender Details</li>
      </ol>
    </section>


    <div class="content">

        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Buyer Order  Tender  Details  </h3>

           @if(session()->has('msg'))
           <div class="alert alert-{{session('type')}}">
               {{session('msg')}}
           </div>
       @endif
            <!-- /.box-header -->

            <div class="box-body">
                   <div class="row">

                <div class="col-md-12">
                     <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th> Id</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Product Quantity</th>
                  <th>Total Price</th>
                  <th>Supplier Name</th>
                </tr>
                </thead>
                <tbody>

                @foreach($tenderlist as $order)
              <tr>

              <td>{{$order->id}}</td>
                   <td>{{$order->product_name}}</td>
                   <td>{{$order->product_price}}</td>
                   <td>{{$order->product_quantity}}</td>
                   <td>{{$order->total_price}}</td>
                   <td>{{$order->name}}</td>
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
