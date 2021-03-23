@extends('backend.layouts.master')

@section('title')
    View Product Stock
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Product Stock</h1>
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
                    Product Stock List
                    <a class="btn btn-success btn-sm float-right" target="_blank" href="{{route('products.report.pdf')}}"><i class="fa fa-download"></i>&nbsp;Download Pdf</a>
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
                          <th>Product Name</th>
                          <th>In_Qty</th>
                          <th>Out_Qty</th>
                          <th>Stock</th>
                          <th>Unit</th>
                        </tr>
                        </thead>
                        <tbody>
                          
                            @foreach($allProducts as  $key=>$product) 
                            @php
                              $buying_total = App\Model\Purchase::where('category_id',$product->category_id)->
                              where('product_id',$product->id)->where('status','1')->sum('buying_qty');

                              $selling_total = App\Model\InvoiceDetails::where('category_id',$product->category_id)->
                              where('product_id',$product->id)->where('status','1')->sum('selling_qty');
                            @endphp
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$product->supplier->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$buying_total}}</td>
                                <td>{{$selling_total}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->unit->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SI NO#</th>
                            <th>Supplier Name</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>In_Qty</th>
                            <th>Out_Qty</th>
                            <th>Stock</th>
                            <th>Unit</th>
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