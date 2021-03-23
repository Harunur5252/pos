@extends('backend.layouts.master')

@section('title')
  Edit Unit
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Unit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Unit</li>
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
                    Update Unit
                    {{-- <a class="btn btn-success btn-sm float-right" href="{{route('suppliers.view')}}"><i class="fa fa-list"></i>&nbsp;Supplier List</a> --}}
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Unit DataTable</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{route('units.update')}}" method="POST" id="myForm">
                            @csrf
                            <div class="form-row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Unit Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$unit->name}}" placeholder="enter unitname">
                                    <input type="hidden" name="id" value="{{$unit->id}}">
                                    <span style="color: red">{{$errors->has('name')?$errors->first('name'):''}}</span>
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