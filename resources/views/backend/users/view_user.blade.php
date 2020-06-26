@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>View users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>


    <div class="content">

        <div class="box">
            <div class="box-header">
            <h3 class="box-title">User List   </h3><a href="{{route('users.add')}}" class="btn btn-primary pull-right">Add User</a>
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
                  <th>Email</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                  @foreach($data as $single_data)

                <tr>
                <td>{{$i++}}</td>
                <td>{{$single_data->name}}</td>
                <td>{{$single_data->email}}</td>
                <td>
                    @php
                    if($single_data->role ==1)
                     echo "Admin";
                     elseif($single_data->role ==2)
                      echo "User";
                      elseif($single_data->role ==3)
                      echo "Supplier";
                    @endphp
                </td>

                {{-- <td>{{$single_data->role ==1 ? 'Admin' : 'User'}}</td> --}}
                <td>
                <a href="{{route('users.edit',$single_data->id)}}" title="Edit" class="btn btn-info"><i class="fa fa-edit"></i></a>
                   <a href="{{route('users.delete',$single_data->id)}}" id="delete" title="Delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
