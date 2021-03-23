@extends('backend.layouts.master')

@section('title')
Paid Customer
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Paid Customer</h1>
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
          <section class="col-lg-12 connectedSortable">
           
            <div class="card">
              <div class="card-header">
                <h3>
                    Paid  Customer List
                    <a class="btn btn-success btn-sm float-right" target="_blank" href="{{route('customers.paid.pdf')}}"><i class="fa fa-download"></i>&nbsp;Download Pdf</a>
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Paid Customer DataTable</h3>
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
                          <th>Amount</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @php
                            $total_sum = 0;
                          @endphp
                            @foreach ($allData as  $key=>$payment) 
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    {{$payment->customer->name}}
                                    ({{$payment->customer->mobile_no}} - {{$payment->customer->address}})
                                </td>
                                <td>Invoice No# {{$payment->invoice->invoice_no}}</td>
                                <td>{{date('d-m-Y',strtotime($payment->invoice->date))}}</td>
                                <td>{{$payment->paid_amount}} Tk.</td>
                                <td>
                                    <a href="{{route('invoice.details.pdf',[$payment->invoice_id])}}" target="_blank" class="btn btn-success btn-sm">Details</a>
                                </td>
                                @php
                                 $total_sum += $payment->due_amount;
                                @endphp
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

                      <table class="table table-bordered table-striped">
                        
                        <tbody>
                          <tr>
                            <td colspan="5" style="text-align: right;"><strong>Grand Total : </strong></td>
                            <td>{{$total_sum}} Tk.</td>
                          </tr>
                        </tbody>
                       
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