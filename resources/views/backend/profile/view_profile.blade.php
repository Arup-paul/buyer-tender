@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>


    <div class="content">

        <div class="box">
            <div class="box-header">

            </div>

            <!-- /.box-header -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="box-body">
                        @if(session()->has('msg'))
                        <div class="alert alert-{{session('type')}}">
                            {{session('msg')}}
                        </div>
                    @endif
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="{{(!empty($user->image)) ?  URL::to('upload/user_images/'.$user->image) : URL::to('upload/default.jpg')}}" alt="User profile picture">

                            <h3 class="profile-username text-center">{{$user->name}}</h3>

                            <p class="text-muted text-center">{{$user->address}}</p>

                             <table  width="100%" class="table table-bordered">
                                 <tbody>
                                     <tr>
                                         <td>Mobile No:</td>
                                         <td>{{$user->mobile}}</td>
                                     </tr>
                                     <tr>
                                        <td>Email:</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender:</td>
                                        <td>{{$user->gender}}</td>
                                    </tr>
                                 </tbody>
                             </table>

                            <a href="{{route('profiles.edit')}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                            </div>
                            <!-- /.box-body -->
                          </div>
                    </div>
                </div>
            </div>

            <!-- /.box-body -->
          </div>

    </div>



  @endsection
