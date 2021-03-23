@extends('backend.layouts.master')

@section('title')
    View Product
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                    Product List
                    <a class="btn btn-success btn-sm float-right" href="{{route('products.add')}}"><i class="fa fa-plus-circle"></i>&nbsp;Add Product</a>
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Product DataTable</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>SI NO#</th>
                          <th>Supplier Name</th>
                          <th>Category</th>
                          <th>Unit</th>
                          <th>Product Name</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ( $allProducts as  $key=>$product) 
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$product->supplier->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->unit->name}}</td>
                                <td>{{$product->name}}</td>
                                @php
                                  $count_product = App\Model\Purchase::where('product_id',$product->id)->count();
                                @endphp
                                <td>
                                    <a href="{{route('products.edit',[$product->id])}}" class="btn btn-success btn-sm">Edit</a>
                                    @if($count_product<1)
                                      <a href="{{route('products.delete',[$product->id])}}" id="delete" class="btn btn-danger btn-sm">Delete</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SI NO#</th>
                            <th>Supplier Name</th>
                            <th>Category</th>
                            <th>Unit</th>
                            <th>Product Name</th>
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