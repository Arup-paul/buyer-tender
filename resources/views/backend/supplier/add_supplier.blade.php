@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Supplier
        <small>Add Supplier</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Supplier</li>
      </ol>
    </section>




    <div class="content">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Add Supplier  </h3><a href="{{route('suppliers.view')}}" class="btn btn-primary pull-right">Supplier List</a>
            </div>

         

            <!-- /.box-header -->
        <form role="form" action="{{route('suppliers.store')}}" method="post">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                      <div class="form-group col-md-6">
                        <label for="id1">Name</label>
                        <input type="text" value="{{old('name')}}" name="name" class="form-control" id="id1" placeholder="Enter name">
                      <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="id2">Mobile No</label>
                        <input type="text" value="{{old('mobile_no')}}" name="mobile_no" class="form-control" id="id2" placeholder="Enter Mobile No">
                        <font style="color:red">{{($errors->has('mobile_no'))?($errors->first('mobile_no')):''}}</font>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="id2">Email</label>
                        <input type="email" value="{{old('email')}}" name="email" class="form-control" id="id2" placeholder="Enter Email">
                        <font style="color:red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                      </div>



                      <div class="form-group col-md-6">
                        <label for="id2">Address</label>
                        <input type="text" value="{{old('address')}}" name="address" class="form-control" id="id2" placeholder="Enter Address">
                        <font style="color:red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                      </div>


                      <div class="form-group col-md-6">
                        <label for="id3">Status</label>
                        <select class="form-control" name="status" id="3">
                              <option value="">--Select Status--</option>
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>

                        </select>
                        <font style="color:red">{{($errors->has('status'))?($errors->first('status')):''}}</font>
                      </div>

                     
                    </div>

                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Add Supplier</button>
                    </div>
                  </form>

            </div>
        </div>
    </div>



  @endsection
