<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Purchase Pdf</title>
    
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
                          <td style="text-align: center;"><strong><u>Daily Purchase Report({{date('d-m-Y',strtotime($start_date))}}) - ({{date('d-m-Y',strtotime($end_date))}})</u></strong></td>
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
                  <th>Purchase No</th>
                  <th>Date</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Total Price</th>
                </tr>
                </thead>
                <tbody>
                    @php
                      $toatl_sum = 0;
                    @endphp
                    @foreach ( $allPurchases as  $key=>$purchase) 
                    <tr>
                        <td style="text-align: center;">{{$key+1}}</td>
                        <td style="text-align: center;">{{$purchase->purchase_no}}</td>
                        <td style="text-align: center;">{{date('d-m-Y',strtotime($purchase->date))}}</td>
                        <td style="text-align: center;">{{$purchase->product->name}}</td>
                        <td style="text-align: center;">
                          {{$purchase->buying_qty}}
                          {{$purchase->product->unit->name}}
                        </td>
                        <td style="text-align: center;">{{$purchase->unit_price}}</td>
                        <td style="text-align: center;">{{$purchase->buying_price}}</td>
                    </tr>
                    @php
                       $toatl_sum += $purchase->buying_price;
                    @endphp
                    @endforeach
                    <tr>
                        <td colspan="6" style="text-align: right;"><strong>Grand Total</strong></td>
                        <td style="text-align: center;">{{$toatl_sum}}</td>
                    </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>SI NO#</th>
                  <th>Purchase No</th>
                  <th>Date</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Total Price</th>
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