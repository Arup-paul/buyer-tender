@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Add users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Users</li>
      </ol>
    </section>




    <div class="content">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Add User  </h3><a href="{{route('users.view')}}" class="btn btn-primary pull-right">User List</a>
            </div>

            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                  @if ($errors->count() == 1)
                      {{$errors->first()}}
                  @else
                   <ul>
                       @foreach($errors->all() as $error)
                   <li>{{$error}}</li>
                   @endforeach
                   </ul>
                   @endif
            </div>

           @endif --}}

            <!-- /.box-header -->
        <form role="form" action="{{route('users.store')}}" method="post">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                      <div class="form-group col-md-6">
                        <label for="id1">Name</label>
                        <input type="text" value="{{old('name')}}" name="name" class="form-control" id="id1" placeholder="Enter name">
                      <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="id2">Email</label>
                        <input type="text" value="{{old('email')}}" name="email" class="form-control" id="id2" placeholder="Enter Email">
                        <font style="color:red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="id3">Role</label>
                        <select class="form-control" name="role" id="3">
                              <option value="">--Select Role--</option>
                              <option value="1">Admin</option>
                              <option value="2">User</option>
                              <option value="3">Supplier</option>

                        </select>
                        <font style="color:red">{{($errors->has('role'))?($errors->first('role')):''}}</font>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="id4">Password</label>
                        <input type="password" name="password" class="form-control" id="id4" placeholder="Password">
                        <font style="color:red">{{($errors->has('password'))?($errors->first('password')):''}}</font>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="id4">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="id4" placeholder="Password">
                        <font style="color:red">{{($errors->has('password_confirmation'))?($errors->first('password_confirmation')):''}}</font>
                      </div>
                    </div>

                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
                  </form>

            </div>
        </div>
    </div>



  @endsection
