@extends('backend.layouts.master')

@section('title')
    Invoice Pending
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Invoice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
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
                    Invoice Pending List
                    {{-- <a class="btn btn-success btn-sm float-right" href="{{route('invoices.add')}}"><i class="fa fa-plus-circle"></i>&nbsp;Add Invoice</a> --}}
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Invoice Pending DataTable</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>SI NO#</th>
                          <th>Customer Name</th>
                          <th>Invoice No</th>
                          <th>Date</th>
                          <th>Description</th>
                          <th>Amount</th>
                          <th>Status</th>
                          <th width="20%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ( $allInvoices as  $key=>$invoice) 
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                  {{$invoice->payment->customer->name}}
                                  ({{$invoice->payment->customer->mobile_no}})-{{$invoice->payment->customer->address}}
                                </td>
                                <td>Invoice No#{{$invoice->invoice_no}}</td>
                                <td>{{date('d-m-Y',strtotime($invoice->date))}}</td>
                                <td>{!! $invoice->description !!}</td>
                                <td>{{$invoice->payment->total_amount}}</td>
                                <td>
                                    @if($invoice->status == '0')
                                       <span class="badge badge-danger badge-sm">Pending</span>
                                    @elseif($invoice->status == '1')
                                       <span class="badge badge-success badge-sm">Approved</span>
                                    @endif
                                </td>
                                  
                                <td>
                                    @if($invoice->status == '0')
                                      <a href="{{route('invoices.approve',[$invoice->id])}}" class="btn btn-success btn-sm">Approve</a>
                                      <a href="{{route('invoices.delete',[$invoice->id])}}" id="delete" class="btn btn-danger btn-sm">Delete</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>SI NO#</th>
                          <th>Customer Name</th>
                          <th>Invoice No</th>
                          <th>Date</th>
                          <th>Description</th>
                          <th>Amount</th>
                          <th>Status</th>
                          <th width="20%">Action</th>
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