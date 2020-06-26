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
        <li class="active">Update Users</li>
      </ol>
    </section>




    <div class="content">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Update User  </h3><a href="{{route('users.view')}}" class="btn btn-primary pull-right">User List</a>
            </div>



            <!-- /.box-header -->
        <form role="form" action="{{route('users.update',$data->id)}}" method="post">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                      <div class="form-group col-md-6">
                        <label for="id1">Name</label>
                        <input type="text" value="{{$data->name}}" name="name" class="form-control" id="id1" placeholder="Enter name">
                      <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="id2">Email</label>
                        <input type="text" value="{{$data->email}}" name="email" class="form-control" id="id2" placeholder="Enter Email">
                        <font style="color:red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="id3">Role</label>
                        <select class="form-control" name="role" id="3">
                              <option value="">--Select Role--</option>
                              <option value="1" {{($data->role==1)?"selected":""}}>Admin</option>
                              <option value="2" {{($data->role==2)?"selected":""}}>User</option>

                        </select>
                        <font style="color:red">{{($errors->has('role'))?($errors->first('role')):''}}</font>
                      </div>

                        </div>

                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                  </form>

            </div>
        </div>
    </div>



  @endsection
