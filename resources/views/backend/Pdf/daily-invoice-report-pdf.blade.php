<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Pdf</title>
    
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td width="25%"></td>
                            <td>
                                <span style="font-size: 20px; background-color:rgb(55, 212, 16);">Shapla Shopping Mall</span>
                                <p style="color:rgba(58, 16, 212, 0.493);">Nikunja-2,Khilkhet,Dhaka</p>
                            </td>
                            <td>
                                 <span>
                                     Showroom     : 01307216770 <br/>
                                     Owner Mobile : 01766248258
                                 </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
           <div class="col-md-12">
              <table width="100%">
                  <tbody>
                      <tr>
                          <td style="text-align: center;"><strong><u>Daily Invoice Report({{date('d-m-Y',strtotime($start_date))}}) - ({{date('d-m-Y',strtotime($end_date))}})</u></strong></td>
                      </tr>
                  </tbody>
              </table>
           </div>
        </div>
        <br>

        <div class="row">
          <div class="col-md-12">
            <table border="1" width="100%">
                <thead>
                <tr>
                  <th>SI NO#</th>
                  <th>Customer Name</th>
                  <th>Invoice No</th>
                  <th>Date</th>
                  <th>Description</th>
                  <th>Amount</th>
                 
                </tr>
                </thead>
                <tbody>
                    @php
                      $total_sum = 0;
                    @endphp
                    @foreach ($allInvoices as  $key=>$invoice) 
                    <tr>
                        <td style="text-align: center;">{{$key+1}}</td>
                        <td style="text-align: center;">
                          {{$invoice->payment->customer->name}}
                          ({{$invoice->payment->customer->mobile_no}})-{{$invoice->payment->customer->address}}
                        </td>
                        <td style="text-align: center;">Invoice No#{{$invoice->invoice_no}}</td>
                        <td style="text-align: center;">{{date('d-m-Y',strtotime($invoice->date))}}</td>
                        <td style="text-align: center;">{{$invoice->description}}</td>
                        <td style="text-align: center;">{{$invoice->payment->total_amount}}</td>
                        @php
                           $total_sum += $invoice->payment->total_amount;
                        @endphp
                    </tr>
                    @endforeach
                    <tr>
                        <td style="text-align: right;" colspan="5"><strong>Grand Total</strong></td>
                        <td>{{$total_sum}}</td>
                    </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>SI NO#</th>
                  <th>Customer Name</th>
                  <th>Invoice No</th>
                  <th>Date</th>
                  <th>Description</th>
                  <th>Amount</th>
                 
                </tr>
                </tfoot>
              </table>
          </div>
        </div>
        <div class="row">
           <div class="col-md-12">
              {{-- <hr style="margin-bottom: 0px;"> --}}
              <br><br><br>
              <table border="0px" witth="100%">
                  <tbody>
                      <tr>
                          <td style="width: 20%;">
                             {{-- <p style="text-align: center; margin-left:20px;">Customer Signature</p> --}}
                          </td>
                          <td style="width: 20%;"></td>
                          <td style="width: 10%; text-align: center;">
                             <p style="text-align: center; border-bottom:1px solid #000;">Owner Signature</p>
                          </td>
                      </tr>
                  </tbody>
              </table>
           </div> 
        </div>
    </div>
    
</body>
</html>