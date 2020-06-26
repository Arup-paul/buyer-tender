@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Supplier
        <small>View Supplier</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Supplier</li>
      </ol>
    </section>


    <div class="content">

        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Supplier List   </h3><a href="{{route('suppliers.add')}}" class="btn btn-primary pull-right">Add Supplier</a>
            </div>

           @if(session()->has('msg'))
           <div class="alert alert-{{session('type')}}">
               {{session('msg')}}
           </div>
       @endif
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Mobile No</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                  @foreach($data as $single_data)

                <tr>
                <td>{{$i++}}</td>
                <td>{{$single_data->name}}</td>
                <td>{{$single_data->mobile_no}}</td>
                <td>{{$single_data->email}}</td>
                <td>{{$single_data->address}}</td>
                <td>{{$single_data->status}}</td>
                <td>
                <a href="{{route('suppliers.edit',$single_data->id)}}" title="Edit" class="btn btn-info"><i class="fa fa-edit"></i></a>
                   <a href="{{route('suppliers.delete',$single_data->id)}}" id="delete" title="Delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
                </tr>
                @endforeach







                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

    </div>



  @endsection
