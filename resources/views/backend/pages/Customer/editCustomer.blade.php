@extends('backend.layouts.master')

@section('title')
  Edit Customer
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
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
                    Update Customer
                    {{-- <a class="btn btn-success btn-sm float-right" href="{{route('suppliers.view')}}"><i class="fa fa-list"></i>&nbsp;Supplier List</a> --}}
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Customer DataTable</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{route('customers.update')}}" method="POST" id="myForm">
                            @csrf
                            <div class="form-row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Customer Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$customer->name}}" placeholder="enter username">
                                    <input type="hidden" name="id" value="{{$customer->id}}">
                                    <span style="color: red">{{$errors->has('name')?$errors->first('name'):''}}</span>
                                </div>
                                
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"  value="{{$customer->email}}" aria-describedby="emailHelp" placeholder="enter email">
                                    <span style="color: red">{{$errors->has('email')?$errors->first('email'):''}}</span>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="number" name="mobile_no" class="form-control" value="{{$customer->mobile_no}}" placeholder="enter mobile no">
                                    <span style="color: red">{{$errors->has('mobile_no')?$errors->first('mobile_no'):''}}</span>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control"  value="{{$customer->address}}" id="address" placeholder="enter address">
                                    <span style="color: red">{{$errors->has('address')?$errors->first('address'):''}}</span>
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

@endsection