@extends('backend.layouts.master')

@section('title')
    View Profile
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <!-- Main row -->
        <div class="row">
          <section class="col-lg-5 offset-md-3 connectedSortable">
           
              <div class="card-body">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">User Profile</h3>
                    </div>
            
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                          <div class="text-center">
                              @if(empty($user->image))
                              <img class="profile-user-img img-fluid img-circle"
                                 src="{{asset('/')}}upload/userprofileimg/noImg.jpg"
                                 alt="no image">
                              @endif

                              @if(!empty($user->image))
                              <img class="profile-user-img img-fluid img-circle"
                                 src="{{asset($user->image)}}"
                                 alt="User profile picture">
                              @endif
                            
                          </div>
          
                          <h3 class="profile-username text-center">{{$user->name}}</h3>
          
                          <p class="text-muted text-center">{{$user->address}}</p>
          
                          <table width="100%" class="table table-bordered">
                             <tbody>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                 <tr>
                                     <td><b>Mobile No</b></td>
                                     <td>{{$user->mobile}}</td>
                                 </tr>
                                 <tr>
                                    <td><b>Gender</b></td>
                                    <td>{{$user->gender}}</td>
                                </tr>
                             </tbody>

                          </table>
          
                          <a href="{{route('profiles.edit')}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                        </div>
                        <!-- /.card-body -->
                      </div>
                  </div>
              </div>
            </section>
        </div>
      </div>
    </section>
  </div>
@endsection