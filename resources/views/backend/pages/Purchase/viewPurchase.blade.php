@extends('backend.layouts.master')

@section('title')
    View Purchase
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Purchase</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Purchase</li>
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
                    Purchase List
                    <a class="btn btn-success btn-sm float-right" href="{{route('purchases.add')}}"><i class="fa fa-plus-circle"></i>&nbsp;Add Purchase</a>
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Purchase DataTable</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                          <th>SI NO#</th>
                          <th>Purchase No</th>
                          <th>Date</th>
                          <th>Supplier Name</th>
                          <th>Category</th>
                          <th>Product Name</th>
                          <th>Description</th>
                          <th>Quantity</th>
                          <th>Unit Price</th>
                          <th>Buying Price</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($allPurchases as  $key=>$purchase) 
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$purchase->purchase_no}}</td>
                                <td>{{date('d-m-Y',strtotime($purchase->date))}}</td>
                                <td>{{$purchase->supplier->name}}</td>
                                <td>{{$purchase->category->name}}</td>
                                <td>{{$purchase->product->name}}</td>
                                <td>{{$purchase->description}}</td>
                                <td>
                                  {{$purchase->buying_qty}}
                                  {{$purchase->product->unit->name}}
                                </td>
                                <td>{{$purchase->unit_price}}</td>
                                <td>{{$purchase->buying_price}}</td>
                                <td>
                                  @if($purchase->status == '0')
                                     <span class="badge badge-danger badge-sm">Pending</span>
                                  @elseif($purchase->status == '1')
                                     <span class="badge badge-success badge-sm">Approved</span>
                                  @endif
                                </td>
                                
                                <td>
                                  @if($purchase->status == '0')
                                    <a href="{{route('purchases.delete',[$purchase->id])}}" id="delete" class="btn btn-danger btn-sm">Delete</a>
                                  @endif
                                </td>
                        
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>SI NO#</th>
                          <th>Purchase No</th>
                          <th>Date</th>
                          <th>Supplier Name</th>
                          <th>Category</th>
                          <th>Product Name</th>
                          <th>Description</th>
                          <th>Quantity</th>
                          <th>Unit Price</th>
                          <th>Buying Price</th>
                          <th>Status</th>
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