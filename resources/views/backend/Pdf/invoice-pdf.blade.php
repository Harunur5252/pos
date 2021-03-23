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
                            <td><strong>Invoice No#{{$invoice->invoice_no}}</strong></td>
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
                          <td style="text-align: center;"><strong><u>Customer Invoice</u></strong></td>
                      </tr>
                  </tbody>
              </table>
           </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
              @php
                $payment = App\Model\Payment::where('invoice_id',$invoice->id)->first();
              @endphp
              
            <table width="100%">
                <tbody>
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
                    @endphp
                    @foreach ($invoice['invoice_details'] as $key=>$invoiceDetail)
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