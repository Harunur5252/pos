@extends('backend.layouts.master')

@section('title')
    View Supplier
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Supplier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Supplier</li>
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
                    Supplier List
                    <a class="btn btn-success btn-sm float-right" href="{{route('suppliers.add')}}"><i class="fa fa-plus-circle"></i>&nbsp;Add Supplier</a>
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Supplier DataTable</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>SI NO#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ( $allSuppliers as  $key=>$supplier) 
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$supplier->name}}</td>
                                <td>{{$supplier->email}}</td>
                                <td>{{$supplier->mobile_no}}</td>
                                @php
                                   $count_supplier = App\Model\Product::where('supplier_id',$supplier->id)->count();
                                @endphp

                                <td>
                                    <a href="{{route('suppliers.edit',[$supplier->id])}}" class="btn btn-success btn-sm">Edit</a>
                                    @if($count_supplier<1)
                                      <a href="{{route('suppliers.delete',[$supplier->id])}}" id="delete" class="btn btn-danger btn-sm">Delete</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SI NO#</th>
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