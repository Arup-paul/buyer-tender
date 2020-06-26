@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tender Details</li>
      </ol>
    </section>


    <div class="content">

        <div class="box">
            <div class="box-header">
            <h3 class="box-title"> Tender  Details  </h3>

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
                  <th>Tender Id</th>
                  <th>Buyer Name</th>
                  <th>Tender Date</th>
                  <th>Total Products</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($tenderlist as $order)
              <tr>

              <td>{{$order->id}}</td>
                   <td>{{$order->name}}</td>
                   <td>{{$order->order_date}}</td>
                   <td>{{$order->total_products}}</td>

                    <td><a href="{{route('tender.status',$order->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a></td>


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
