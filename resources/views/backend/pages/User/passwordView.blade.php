@extends('backend.layouts.master')

@section('title')
    View Password
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Password</li>
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
                      <h3 class="card-title">Update Password</h3>
                    </div>
            
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <form action="{{route('profiles.passwordUpdate')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label  class="form-label">Current Password</label>
                                  <input type="password" name="oldpass" class="form-control" placeholder="currrent_password">
                                  <span style="color: red">{{$errors->has('oldpass')?$errors->first('oldpass'):''}}</span>
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">New Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="new_password">
                                    <span style="color: red">{{$errors->has('password')?$errors->first('password'):''}}</span>
                                  </div>
                                  <div class="mb-3">
                                    <label  class="form-label">Again New Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="again_new_password">
                                    <span style="color: red">{{$errors->has('password_confirmation')?$errors->first('password_confirmation'):''}}</span>
                                  </div>
                                <button class="btn btn-primary btn-block"><b>Update Password</b></button>
                              </form>
                          
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