<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Stock Pdf</title>
    
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
                          <td style="text-align: center;"><strong><u>Product Stock</u></strong></td>
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
                  <th>Supplier Name</th>
                  <th>Category</th>
                  <th>Product Name</th>
                  <th>In_Qty</th>
                  <th>Out_Qty</th>
                  <th>Stock</th>
                  <th>Unit</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($allProducts as  $key=>$product) 
                    @php
                    $buying_total = App\Model\Purchase::where('category_id',$product->category_id)->
                    where('product_id',$product->id)->where('status','1')->sum('buying_qty');

                    $selling_total = App\Model\InvoiceDetails::where('category_id',$product->category_id)->
                    where('product_id',$product->id)->where('status','1')->sum('selling_qty');
                  @endphp
                    <tr>
                        <td style="text-align: center;">{{$key+1}}</td>
                        <td style="text-align: center;">{{$product->supplier->name}}</td>
                        <td style="text-align: center;">{{$product->category->name}}</td>
                        <td style="text-align: center;">{{$product->name}}</td>
                        <td style="text-align: center;">{{$buying_total}}</td>
                        <td style="text-align: center;">{{$selling_total}}</td>
                        <td style="text-align: center;">{{$product->quantity}}</td>
                        <td style="text-align: center;">{{$product->unit->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>SI NO#</th>
                    <th>Supplier Name</th>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th>In_Qty</th>
                    <th>Out_Qty</th>
                    <th>Stock</th>
                    <th>Unit</th>
                </tr>
                </tfoot>
              </table>
          </div>
        </div>
        <br>
        @php
          $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        @endphp
       <i>Printing Time : {{$date->format('F,j,Y,g:i,a')}}</i>
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