@extends('backend.layouts.master')

@section('title')
    edit Invoice
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Credit Customer</h1>
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
                    Edit Invoice (Invoice No# {{$payment->invoice->invoice_no}}) 
                    <a class="btn btn-success btn-sm float-right" href="{{route('customers.credit')}}"><i class="fa fa-list"></i>&nbsp;Credit Customer List</a>
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    {{-- <div class="card-header">
                      <h3 class="card-title">Customer DataTable</h3>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table width="100%">
                            <tbody>
                              <tr>
                                <td colspan="3"><strong>Customer Info</strong></td>
                              </tr>
                                <tr>
                                    <td width="30%"><strong>Name:</strong> {{$payment->customer->name}}</td>
                                    <td width="30%"><strong>Mobile:</strong> {{$payment->customer->mobile_no}}</td>
                                    <td width="40%"><strong>Address:</strong> {{$payment->customer->address}}</td>
                                </tr>
                            </tbody>
                        </table> 

                        <form action="{{route('update.invoice',[$payment->invoice_id])}}" method="POST">
                          @csrf
                           <table width="100%" border="1">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL.</th>
                                    <th style="text-align: center;">Category</th>
                                    <th style="text-align: center;">Product Name</th>
                                    <th style="text-align: center;">Quantity</th>
                                    <th style="text-align: center;">Unit Price</th>
                                    <th style="text-align: center;">Total Price</th>
                                </tr>
                                @php
                                 $total_sum = 0;
                                 $invoice_details=App\Model\invoiceDetails::where('invoice_id',$payment->invoice_id)->get();
                                @endphp
                                @foreach ($invoice_details as $key=>$invoiceDetail)
                                <tr>
                                   <td style="text-align: center;">{{$key+1}}</td>
                                   <td style="text-align: center;">{{$invoiceDetail->category->name}}</td>
                                   <td style="text-align: center;">{{$invoiceDetail->product->name}}</td>
                                   <td style="text-align: center;">{{$invoiceDetail->selling_qty}}</td>
                                   <td style="text-align: center;">{{$invoiceDetail->unit_price}}</td>
                                   <td style="text-align: center;">{{$invoiceDetail->selling_price}}</td>
                                </tr>
                                 @php
                                  $total_sum += $invoiceDetail->selling_price;
                                 @endphp
                                @endforeach
                                <tr>
                                    <td colspan="5" style="text-align: right;"><strong>Sub Total</strong></td>
                                    <td style="text-align: center;"><strong>{{$total_sum}}</strong></td>
                                </tr>
                                <tr>
                                   <td colspan="5" style="text-align: right;">Discount</td>
                                   <td style="text-align: center;"><strong>{{$payment->discount_amount}}</strong></td>
                                </tr>
                                <tr>
                                   <td colspan="5" style="text-align: right;">Paid Amount</td>
                                   <td style="text-align: center;"><strong>{{$payment->paid_amount}}</strong></td>
                                </tr>
                                <tr>
                                   <td colspan="5" style="text-align: right;">Due Amount</td>
                                   <input type="hidden" name="new_due_amount" value="{{$payment->due_amount}}">
                                   <td style="text-align: center;"><strong>{{$payment->due_amount}}</strong></td>
                                </tr>
                                <tr>
                                   <td colspan="5" style="text-align: right;"><strong>Grand Total</strong></td>
                                   <td style="text-align: center;"><strong>{{$payment->total_amount}}</strong></td>
                               </tr>
                               
                            </thead>
                         </table>
                         <div class="row mt-4">
                          <div class="form-group col-md-4">
                            <label for="">Paid Status</label>
                            <select name="paid_status" id="paid_status" class="form-control form-control-sm" style="width: 100%;">
                              <option value="" selected disabled>select status</option>
                              <option value="full_paid">Full Paid</option>
                              <option value="partial_paid">Partial Paid</option>
                            </select>
                            <span style="color: red">{{$errors->has('paid_status')?$errors->first('paid_status'):''}}</span>
                            <input type="number" name="paid_amount" class="form-control form-control-sm" id="paid_amount" style="display: none;" placeholder="how much do you want to paid?">
                          </div>  

                          <div class="form-group col-md-4">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control form-control-sm datepicker" id="date" readonly placeholder="YYYY-MM-DD">
                            <span style="color: red">{{$errors->has('date')?$errors->first('date'):''}}</span>
                          </div>

                          <div class="form-group col-md-4" style="padding-top: 31px;">
                             <button type="submit" class="btn btn-success btn-sm">Update Invoice</button>
                          </div>
                         </div>
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

  {{-- partial status --}}
<script type="text/javascript">
  $(document).on('change','#paid_status',function(){
    var paid_status = $(this).val();
    if(paid_status == 'partial_paid'){
      $('#paid_amount').show();
    }else{
     $('#paid_amount').hide();
    }
   
  })
 </script>

<script>
  $('.datepicker').datepicker({
      uiLibrary: 'bootstrap4',
      format:'yyyy-mm-dd'
  });
</script>
@endsection