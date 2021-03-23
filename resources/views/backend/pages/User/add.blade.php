@extends('backend.layouts.master')

@section('title')
    Add User
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
          <section class="col-lg-8 connectedSortable">
           
            <div class="card">
              <div class="card-header">
                <h3>
                    Add User
                    <a class="btn btn-success btn-sm float-right" href="{{route('users.view')}}"><i class="fa fa-list"></i>&nbsp;User List</a>
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">User DataTable</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{route('users.store')}}" method="POST" id="myForm">
                            @csrf
                            <div class="form-row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">User Role</label>
                                    <select name="usertype" class="form-control">
                                        <option disabled selected>select user</option>
                                        <option value="admin">Admin</option> 
                                        <option value="user">User</option> 
                                    </select>
                                    <span style="color: red">{{$errors->has('usertype')?$errors->first('usertype'):''}}</span>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="enter username">
                                    <span style="color: red">{{$errors->has('name')?$errors->first('name'):''}}</span>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="number" name="mobile" class="form-control" value="{{old('mobile')}}" placeholder="enter username">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control"  value="{{old('email')}}" aria-describedby="emailHelp" placeholder="enter email">
                                    <span style="color: red">{{$errors->has('email')?$errors->first('email'):''}}</span>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control"  value="{{old('password')}}" id="password" placeholder="enter password">
                                    <span style="color: red">{{$errors->has('password')?$errors->first('password'):''}}</span>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password"  name="password2" class="form-control" value="{{old('password2')}}" placeholder="enter co-password">
                                    <span style="color: red">{{$errors->has('password2')?$errors->first('password2'):''}}</span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                    <!-- /.card-body -->
                  </div>
              </div>
            </div>
        </div>
      </div>
    </section>
  </div>

   {{-- <script type="text/javascript">
    $(document).ready(function () {
      $('#myForm').validate({
        rules: {
          usertype: {
            required: true,
          },
          name: {
            required: true,
            name: true,
          },
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 8
          },
          password2: {
            required: true,
            equalTo:'#password'
          },
        },
        messages: {
          usertype: {
            required: "Please select usertype",
          },
          name: {
            required: "Please enter your name",
            name: "Please enter a vaild name"
          },
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long"
          },
          password2: {
            required: "Please provide a confirm password",
            minlength: "confirm password does not match"
          },
         
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>  --}}

@endsection