@extends('backend.layouts.master')

@section('title')
    Update Profile
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
              <li class="breadcrumb-item active">Profile</li>
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
                    Update profile
                    <a class="btn btn-success btn-sm float-right" href="{{route('profiles.view')}}"><i class="fa fa-list"></i>&nbsp;Your Profile</a>
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">User Profile</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{route('profiles.update')}}" method="POST" name="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                            
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="enter username">
                                    <span style="color: red">{{$errors->has('name')?$errors->first('name'):''}}</span>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control"  value="{{$user->email}}" aria-describedby="emailHelp" placeholder="enter email">
                                    <span style="color: red">{{$errors->has('email')?$errors->first('email'):''}}</span>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="number" name="mobile" class="form-control" value="{{$user->mobile}}" placeholder="enter mobile">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" value="{{$user->address}}" placeholder="enter address">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Gender</label>
                                    <select name="gender" class="form-control">
                                        <option disabled selected>select gender</option>
                                        <option value="male">Male</option> 
                                        <option value="female">Female</option> 
                                    </select>
                                    <span style="color: red">{{$errors->has('gender')?$errors->first('gender'):''}}</span>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Photo</label>
                                    <input type="file" name="image" class="form-control" accept="image/*" id="image">
                                    <span style="color: red">{{$errors->has('image')?$errors->first('image'):''}}</span>
                                </div>
                                <div class="mb-3 col-md-4">
                                    @if(empty($user->image))
                                       <img src="{{asset('/')}}upload/userprofileimg/noImg.jpg" id="showImg" alt="no image" style="height:160px;width:150px; border:1px solid black;">
                                    @endif

                                    @if(!empty($user->image))
                                       <img src="{{asset($user->image)}}" alt="User profile picture" id="showImg" style="height:160px;width:150px; border:1px solid black;">
                                    @endif
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
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

  <script>
    document.forms['form'].elements['gender'].value = '{{$user->gender}}';
  </script>

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