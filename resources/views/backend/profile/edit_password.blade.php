@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Manage Password</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Password</li>
      </ol>
    </section>




    <div class="content">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Password Change </h3>
            </div>


            @if(session()->has('msg'))
            <div class="alert alert-{{session('type')}}">
                {{session('msg')}}
            </div>
        @endif
            <!-- /.box-header -->
        <form role="form" action="{{route('password.new.store')}}" method="post">
                    @csrf
                    <div class="box-body">
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="id4">Old Password</label>
                                <input type="password" name="current_password" class="form-control" id="id4" placeholder="Current Password">
                                <font style="color:red">{{($errors->has('current_password'))?($errors->first('current_password')):''}}</font>
                              </div>

                      <div class="form-group col-md-4">
                        <label for="id4">New Password</label>
                        <input type="password" name="password" class="form-control" id="id4" placeholder="Password">
                        <font style="color:red">{{($errors->has('password'))?($errors->first('password')):''}}</font>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="id4">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="id4" placeholder="Password">
                        <font style="color:red">{{($errors->has('password_confirmation'))?($errors->first('password_confirmation')):''}}</font>
                      </div>
                    </div>

                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form>

            </div>
        </div>
    </div>



  @endsection
