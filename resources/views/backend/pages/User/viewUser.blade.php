@extends('backend.layouts.master')

@section('title')
    View User
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage User</h1>
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
          <section class="col-lg-12 connectedSortable">
           
            <div class="card">
              <div class="card-header">
                <h3>
                    User List
                    <a class="btn btn-success btn-sm float-right" href="{{route('users.add')}}"><i class="fa fa-plus-circle"></i>&nbsp;Add User</a>
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">User DataTable</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>SI NO#</th>
                          <th>Role</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ( $allUsers as  $key=>$allUser) 
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$allUser->usertype}}</td>
                                <td>{{$allUser->name}}</td>
                                <td>{{$allUser->email}}</td>
                                <td>{{$allUser->mobile}}</td>
                                <td>
                                    <a href="{{route('users.edit',[$allUser->id])}}" class="btn btn-success btn-sm">Edit</a>
                                    <a href="{{route('users.delete',[$allUser->id])}}" id="delete" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SI NO#</th>
                            <th>Role</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
              </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection