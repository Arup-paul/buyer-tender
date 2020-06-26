@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Manage Profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Profile</li>
      </ol>
    </section>




    <div class="content">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Update Profile  </h3><a href="{{route('profiles.view')}}" class="btn btn-primary pull-right">Your Profile</a>
            </div>



            <!-- /.box-header -->
        <form role="form" action="{{route('profiles.update')}}" method="post" enctype="multipart/form-data">
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
                        <label for="id1">Mobile Number</label>
                        <input type="text" value="{{$data->mobile}}" name="mobile" class="form-control" id="id1" placeholder="Enter name">
                      <font style="color:red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="id1">Address</label>
                        <input type="text" value="{{$data->address}}" name="address" class="form-control" id="id1" placeholder="Enter name">
                      <font style="color:red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="id1">Gender</label>
                        <select class="form-control" name="gender" id="3">
                            <option value="">--Select Gender--</option>
                            <option value="male" {{($data->role=="male")?"selected":""}}>Male</option>
                            <option value="female" {{($data->role=="female")?"selected":""}}>Female</option>
                            <option value="other" {{($data->role=="other")?"selected":""}}>Other</option>

                      </select>
                      <font style="color:red">{{($errors->has('gender'))?($errors->first('gender')):''}}</font>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="id1">Image</label>
                        <input type="file" value="{{$data->image}}" accept="image/*" class="upload" onchange="readURL(this);" name="image" class="form-control"  placeholder="Enter name">
                      <font style="color:red">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                      </div>
                      <div class="form-group col-md-6">
                      <img id="image" src="{{(!empty($data->image)) ?  URL::to('upload/user_images/'.$data->image) : URL::to('upload/default.jpg')}}" width="150px" height="150px;" alt="">
                      </div>

                        </div>

                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                  </form>

            </div>
        </div>
    </div>



  @endsection
