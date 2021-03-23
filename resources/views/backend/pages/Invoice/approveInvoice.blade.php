@extends('backend.layouts.master')

@section('title')
 Invoice Approve
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
                    Invoice No #{{$invoice->invoice_no}}-({{date('d-m-Y',strtotime($invoice->date))}})
                    <a class="btn btn-success btn-sm float-right" href="{{route('invoices.pending')}}"><i class="fa fa-list"></i>&nbsp;Pending Invoice List</a>
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    <div class="card-header">
                      {{-- <h3 class="card-title">Invoice DataTable</h3> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @php
                          $payment = App\Model\Payment::where('invoice_id',$invoice->id)->first();
                        @endphp
                        
                      <table width="100%">
                          <tbody>
                              <tr>
                                  <td width="15%"><p><strong>Customer Info</strong></p></td>
                                  <td width="25%"><p><strong>Name :</strong> {{$payment->customer->name}}</p></td>
                                  <td width="25%"><p><strong>Mobile Number : </strong>{{$payment->customer->mobile_no}}</p></td>
                                  <td width="35%"><p><strong>Address : </strong>{{$payment->customer->address}}</p></td>
                              </tr>
                              <tr>
                                <td width="15%"></td>
                                <td width="85%" colspan="3"><p><strong>Description : </strong>{!! $invoice->description !!}</p></td>
                              </tr>
                          </tbody>
                      </table>

                      <form action="{{route('approve.store',[$invoice->id])}}" method="POST">
                        @csrf
                          <table width="100%" border="1">
                         <thead>
                             <tr class="text-center">
                                 <th>SL.</th>
                                 <th>Category</th>
                                 <th>Product Name</th>
                                 <th style="background-color: darkkhaki">Current Stock</th>
                                 <th>Quantity</th>
                                 <th>Unit Price</th>
                                 <th>Total Price</th>
                             </tr>
                             @php
                              $total_sum = 0;
                             @endphp
                             @foreach ($invoice['invoice_details'] as $key=>$invoiceDetail)
                             <tr class="text-center">
                                {{-- <input type="hidden" name="category_id[]" value="{{$invoiceDetail->category_id}}">
                                <input type="hidden" name="product_id[]" value="{{$invoiceDetail->product_id}}"> --}}
                                <input type="hidden" name="selling_qty[{{$invoiceDetail->id}}]" value="{{$invoiceDetail->selling_qty}}">
                                <td>{{$key+1}}</td>
                                <td>{{$invoiceDetail->category->name}}</td>
                                <td>{{$invoiceDetail->product->name}}</td>
                                <td>{{$invoiceDetail->product->quantity}}</td>
                                <td>{{$invoiceDetail->selling_qty}}</td>
                                <td>{{$invoiceDetail->unit_price}}</td>
                                <td>{{$invoiceDetail->selling_price}}</td>
                             </tr>
                              @php
                               $total_sum += $invoiceDetail->selling_price;
                              @endphp
                             @endforeach
                             <tr>
                                 <td colspan="6" class="text-right"><strong>Sub Total</strong></td>
                                 <td class="text-center"><strong>{{$total_sum}}</strong></td>
                             </tr>
                             <tr>
                                <td colspan="6" class="text-right">Discount</td>
                                <td class="text-center"><strong>{{$payment->discount_amount}}</strong></td>
                             </tr>
                             <tr>
                                <td colspan="6" class="text-right">Paid Amount</td>
                                <td class="text-center"><strong>{{$payment->paid_amount}}</strong></td>
                             </tr>
                             <tr>
                                <td colspan="6" class="text-right">Due Amount</td>
                                <td class="text-center"><strong>{{$payment->due_amount}}</strong></td>
                             </tr>
                             <tr>
                                <td colspan="6" class="text-right"><strong>Grand Total</strong></td>
                                <td class="text-center"><strong>{{$payment->total_amount}}</strong></td>
                            </tr>
                         </thead>
                      </table>
                      <button type="submit" class="btn btn-success mt-3">Invoice Approve</button>
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