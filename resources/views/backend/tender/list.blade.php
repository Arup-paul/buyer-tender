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
            <h3 class="box-title">Buyer Tender list   </h3>

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
                            <h4>Tender</h4>
                        </div>
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-right">M3 Tech</h4>

                                </div>
                                <div class="pull-right">
                                    <h4>Tender # <br>
                                    <strong>{{date('d/m/Y')}}</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="pull-left m-t-30">
                                        <address>
                                        <strong>Name: {{$supplier->name}}</strong><br>
                                          Mobile: {{$supplier->mobile_no}}<br>
                                          Email: {{$supplier->email}}<br>
                                          Address: {{$supplier->address}}<br>
                                          </address>
                                    </div>
                                    <div class="pull-right m-t-30">
                                        <p><strong>Tender Date: </strong> {{date('l jS \of F Y ')}}</p>
                                        <p class="m-t-10"><strong>Tender  Status: </strong> <span class="label label-pink">Pending</span></p>
                                        @php

                                        @endphp
                                        <p class="m-t-10"><strong>Tender ID: </strong> #123456</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-h-50"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table m-t-30">
                                            <thead>
                                                <tr><th>#</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                            </tr></thead>
                                            <tbody>
                                                @php
                                                $sl = 1;
                                                @endphp
                                             @foreach($contents as $single)
                                                <tr>
                                                <td>{{$sl++}}</td>
                                                <td>{{$single->name}}</td>
                                                    <td>{{$single->qty}}</td>
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
                                    <a href="" class="btn btn-sm btn-primary pull-right btn btn-sm  btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Submit</a>
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


     {{-- modal  --}}

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title text-info">Confirm Tender
            </h4>

            </div>



            <div class="modal-body">
            <form  action="{{route('final-tender')}}" method="post" enctype="multipart/form-data">
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

                <input type="hidden" value="{{auth()->user()->id}}" name="user_id">

                <div class="row">



                <input type="hidden" name="supplier_id" value="{{$supplier->id}}">
                <input type="hidden" name="order_date" value="{{date('d/m/Y')}}">
                <input type="hidden" name="order_status" value="pending">
                <input type="hidden" name="total_products" value="{{Cart::count()}}">
                <input type="hidden" name="vat" value="{{Cart::tax()}}">
                <input type="hidden" name="sub_total" value="{{Cart::subtotal()}}">
                <input type="hidden" name="total" value="{{Cart::total()}}">





                </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-info waves-effect waves-light">Confirm</button>
            </div>
        </form>
        </div>

        </div>
    </div>
</div>

{{-- modal  --}}



  @endsection
