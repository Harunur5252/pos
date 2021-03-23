@extends('backend.layouts.master')

@section('title')
    View Purchase PendingList
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
              <li class="breadcrumb-item active">Purchase PendingList</li>
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
                    Purchase Pending List
                    {{-- <a class="btn btn-success btn-sm float-right" href="{{route('purchases.add')}}"><i class="fa fa-plus-circle"></i>&nbsp;Add Purchase</a> --}}
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
                          <th>Staus</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ( $allPurchasePendings as  $key=>$allPurchasePending) 
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$allPurchasePending->purchase_no}}</td>
                                <td>{{date('d-m-Y',strtotime($allPurchasePending->date))}}</td>
                                <td>{{$allPurchasePending->supplier->name}}</td>
                                <td>{{$allPurchasePending->category->name}}</td>
                                <td>{{$allPurchasePending->product->name}}</td>
                                <td>{{$allPurchasePending->description}}</td>
                                <td>
                                  {{$allPurchasePending->buying_qty}}
                                  {{$allPurchasePending->product->unit->name}}
                                </td>
                                <td>{{$allPurchasePending->unit_price}}</td>
                                <td>{{$allPurchasePending->buying_price}}</td>
                                <td>
                                  @if($allPurchasePending->status == '0')
                                     <span class="badge badge-danger badge-sm">Pending</span>
                                  @elseif($allPurchasePending->status == '1')
                                     <span class="badge badge-success badge-sm">Approved</span>
                                  @endif
                                </td>
                                
                                <td>
                                  @if($allPurchasePending->status == '0')
                                    <a href="{{route('purchases.approve',[$allPurchasePending->id])}}" id="approve" class="btn btn-success btn-sm">Approve</a>
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
                          <th>Staus</th>
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