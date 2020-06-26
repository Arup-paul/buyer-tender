@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product
        <small>Add Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Product</li>
      </ol>
    </section>




    <div class="content">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Add Product  </h3>
            </div>


         @if(session()->has('msg'))
           <div class="alert alert-{{session('type')}}">
               {{session('msg')}}
           </div>
       @endif
            <!-- /.box-header -->
        <form role="form" action="{{route('products.creates')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                      <div class="form-group col-md-6">
                        <label for="id1">Product Name</label>
                        <input type="text" value="{{old('p_name')}}" name="p_name" class="form-control" id="id1" placeholder="Enter Product Name">
                      <font style="color:red">{{($errors->has('p_name'))?($errors->first('p_name')):''}}</font>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="id2">Product Color</label>
                        <input type="text" value="{{old('p_color')}}" name="p_color" class="form-control" id="id2" placeholder="Enter Product color">
                        <font style="color:red">{{($errors->has('p_color'))?($errors->first('p_color')):''}}</font>
                      </div>

                         <div class="form-group col-md-6">
                        <label for="id2">Product Price</label>
                        <input type="text" value="{{old('p_price')}}" name="p_price" class="form-control" id="id2" placeholder="Enter Product Price">
                        <font style="color:red">{{($errors->has('p_price'))?($errors->first('p_price')):''}}</font>
                      </div>

                         <div class="form-group col-md-6">
                        <label for="id2">Product Image</label>
                        <input type="file"  name="p_image" class="form-control" id="id2" >
                        <font style="color:red">{{($errors->has('p_image'))?($errors->first('php ')):''}}</font>
                      </div>





                    </div>

                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                  </form>

            </div>
        </div>
    </div>



  @endsection
