@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tender  Product</li>
      </ol>
    </section>


    <div class="content">

        <div class="box">
            <div class="box-header">
            <h3 class="box-title"> Tender  Product  </h3>

           @if(session()->has('msg'))
           <div class="alert alert-{{session('type')}}">
               {{session('msg')}}
           </div>
       @endif
            <!-- /.box-header -->

            <div class="box-body">
                    <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                         <div class="panel-heading">
                            <h4>Tender Confirmation apply to supplier</h4>
                        </div>
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-right">Rio</h4>

                                </div>
                                <div class="pull-right">
                                    <h4>Order # <br>
                                    <strong>{{$order->order_date}}</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="pull-left m-t-30">
                                        <address>
                                        <strong>Name: {{$order->name}}</strong><br>
                                          Mobile: {{$order->mobile}}<br>
                                          Address: {{$order->address}}<br>
                                          </address>
                                    </div>
                                    <div class="pull-right m-t-30">
                                        <p><strong>Today: </strong> {{date('l jS \of F Y ')}}</p>
                                        <p class="m-t-10"><strong>Tender Status: </strong> <span class="label label-pink">{{$order->order_status}}</span></p>
                                        @php

                                        @endphp
                                        <p class="m-t-10"><strong>Tender ID: </strong> {{{$order->id}}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-h-50"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table m-t-30">
                                            <thead>
                                                <tr>
                                                    <th>Sl</th>
                                                <th>Product name</th>
                                                <th>Product Price</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>
                                            </tr></thead>
                                            <tbody>
                                                @php
                                                $sl = 1;
                                                @endphp
                                             @foreach($order_details as $single)
                                                <tr>
                                                <td>{{$sl++}}</td>
                                                <td>{{$single->p_name}}</td>
                                                 <td>{{$single->p_price}}</td>
                                                   <td>{{$single->quantity}}</td>
                                                 <td>{{($single->p_price)*($single->quantity)}}</td>


                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="hidden-print">
                                <div class="pull-right">
                                    <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                <  <a href="" class="btn btn-sm btn-primary pull-right btn btn-sm  btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Submit</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            </div>
            <!-- /.box-body -->
          </div>

    </div>
    </div>

    {{-- modal --}}

    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title text-info">Confirm Tender Request for Buyer
            </h4>

            </div>



            <div class="modal-body">
            <form  action="{{route('supplierOrdered')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                  @endif


                <div class="row">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
               @foreach($order_details as $single)

                <input type="hidden" name="product_name" value="{{$single->p_name}}">
                <input type="hidden" name="product_price" value="{{$single->p_price}}">
                <input type="hidden" name="product_quantity" value="{{$single->quantity}}">
                <input type="hidden" name="total_price" value="{{($single->p_price)*($single->quantity)}}">

              @endforeach



                </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-info waves-effect waves-light">Confirm</button>
            </div>
        </form>
        </div>

        </div>
    </div>
</div>



  @endsection
