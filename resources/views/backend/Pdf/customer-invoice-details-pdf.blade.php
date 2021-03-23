<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Invoice Details Pdf</title>
    
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td><strong>Invoice No#{{$payment->invoice->invoice_no}}</strong></td>
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
                          <td style="text-align: center;"><strong><u>Customer Invoice Details</u></strong></td>
                      </tr>
                  </tbody>
              </table>
           </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
            <table width="100%">
                <tbody>
                    <tr>
                        <td colspan="3"><strong>Customer Info</strong></td>
                      </tr>
                    <tr>
                        <td width="30%"><strong>Name:</strong>{{$payment->customer->name}}</td>
                        <td width="30%"><strong>Mobile:</strong>{{$payment->customer->mobile_no}}</td>
                        <td width="40%"><strong>Address:</strong>{{$payment->customer->address}}</td>
                    </tr>
                </tbody>
            </table> 
            </div>
        </div>
        

        <div class="row">
          <div class="col-md-12">
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
                       <td style="text-align: center;"><strong>{{$payment->due_amount}}</strong></td>
                    </tr>
                    <tr>
                       <td colspan="5" style="text-align: right;"><strong>Grand Total</strong></td>
                       <td style="text-align: center;"><strong>{{$payment->total_amount}}</strong></td>
                   </tr>
                   <tr>
                       <td colspan="6" style="text-align: center;"><strong>Paid Summary</strong></td>
                   </tr>
                   <tr>
                       <td colspan="3" style="text-align: center;"><strong>Date</strong></td>
                       <td colspan="3" style="text-align: center;"><strong>Amount</strong></td>
                   </tr>
                   @php
                     $payment_datails = App\Model\PaymentDetails::where('invoice_id',$payment->invoice_id)->get();
                   @endphp
                   @foreach ($payment_datails as $payment_datail)
                    <tr>
                        <td colspan="3" style="text-align: center;">{{date('m-d-Y',strtotime($payment_datail->date))}}</td>
                        <td colspan="3" style="text-align: center;">{{$payment_datail->current_paid_amount}}</td>
                    </tr>
                   @endforeach
                </thead>
             </table>
             <br>
             @php
               $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
             @endphp
             <i>Printing Time : {{$date->format('F,j,Y,g:i,a')}}</i>
             
          </div>
        </div>

        <div class="row">
           <div class="col-md-12">
              <hr style="margin-bottom: 0px;">
              <table border="0px" witth="100%">
                  <tbody>
                      <tr>
                          <td style="width: 20%;">
                             <p style="text-align: center; margin-left:20px;">Customer Signature</p>
                          </td>
                          <td style="width: 20%;"></td>
                          <td style="width: 40%; text-align: center;">
                             <p style="text-align: center;">Saller Signature</p>
                          </td>
                      </tr>
                  </tbody>
              </table>
           </div> 
        </div>
    </div>
    
</body>
</html>