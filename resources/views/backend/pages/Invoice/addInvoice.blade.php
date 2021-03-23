@extends('backend.layouts.master')

@section('title')
  Add Invoice
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Invoice</h1>
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
                    Add Invoice
                    <a class="btn btn-success btn-sm float-right" href="{{route('invoices.view')}}"><i class="fa fa-list"></i>&nbsp;Invoice List</a>
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Invoice DataTable</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <div class="form-row">
                                <div class="mb-3 col-md-2">
                                    <label class="form-label">Invoice No</label>
                                    <input type="text" name="invoice_no" class="form-control form-control-sm" id="invoice_no" value="{{$invoice_no}}" readonly style="background-color: aquamarine">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date" value={{$date}} class="form-control form-control-sm datepicker" id="date" readonly placeholder="YYYY-MM-DD">
                                </div>
                                
                                <div class="mb-3 col-md-2">
                                    <label class="form-label">Category Name</label>
                                    <select name="category_id" id="category_id" class="form-control select2 form-control-sm" style="width: 100%;">
                                        <option value="" selected disabled>select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
     
                                <div class="mb-3 col-md-2">
                                    <label class="form-label">Product Name</label>
                                    <select name="product_id" id="product_id" class="form-control select2 form-control-sm" style="width: 100%;">
                                        <option value="" selected disabled>select product</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <label class="form-label">Stock</label>
                                    <input type="text" name="current_stock_qty" id="current_stock_qty" class="form-control form-control-sm text-white" readonly style="background-color: rgb(5, 7, 2)">
                                </div>
                                <div class="mb-3 col-md-1" style="padding-top: 33px;">
                                    <a class="btn btn-success btn-sm text-white addeventmore"><i class="fa fa-plus-circle"></i>&nbsp;Add</a>
                                </div>
                            </div>
                    </div>

                    <div class="card-body">
                      <form action="{{route('invoices.store')}}" method="POST" id="">
                        @csrf
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              {{-- <th scope="col">#</th> --}}
                              <th scope="col" width="15%">Category</th>
                              <th scope="col" width="15%">Product Name</th>
                              <th scope="col" width="7%">Pcs/Kg</th>
                              <th scope="col" width="15%">Unit Price</th>
                              <th scope="col" width="15%">Total Price</th>
                              <th scope="col" width="10%">Action</th>
                            </tr>
                          </thead>
                          <tbody id="addRow" class="addRow">
                            
                           
                          </tbody>

                          <tbody>
                            <tr>
                              <td class="text-right" colspan="4">Discount</td>
                              <td>
                                <input type="number" name="discount_amount" id="discount_amount" class="form-control form-control-sm  discount_amount text-right" placeholder="enter discount amount">
                              </td>
                              <td></td>
                            </tr>

                            <tr>
                              <td class="text-right" colspan="4">Grand Total</td>
                              <td>
                                <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color: rgb(127, 225, 255)">
                              </td>
                              <td></td>
                            </tr>
                           
                          </tbody>
                        </table>
                        <br>
                          <div class="form-row">
                           <div class="form-group col-md-12">
                             <label for="">Description</label>
                              <textarea name="description" class="form-control my-5 description" placeholder="write description here"></textarea>
                           </div>
                          </div>
                           <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="">Paid Status</label>
                              <select name="paid_status" id="paid_status" class="form-control form-control-sm" style="width: 100%;">
                                <option value="" selected disabled>select status</option>
                                <option value="full_paid">Full Paid</option>
                                <option value="full_due">Full Due</option>
                                <option value="partial_paid">Partial Paid</option>
                              </select>
                              <input type="number" name="paid_amount" class="form-control form-control-sm" id="paid_amount" style="display: none;" placeholder="how much do you want to paid?">
                            </div>  
                            <div class="form-group col-md-8">
                              <label for="">Customer Name</label>
                              <select name="customer_id" id="customer_id" class="form-control select2 form-control-sm" style="width: 100%;">
                                <option value="" selected disabled>select customer</option>
                                @foreach ($customers as $customer)
                                 <option value="{{$customer->id}}">{{$customer->name}} ({{$customer->mobile_no}}) - {{$customer->address}}</option>
                                @endforeach
                                <option value="0">New Customer</option>
                              </select>
                            </div>
                           </div>
                           <div class="form-row new-customer" style="display: none;">
                                <div class="form-group col-md-4">
                                    <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="write customer name">
                                </div>
                                <div class="form-group col-md-4">
                                  <input type="number" name="mobile_no" id="mobile_no" class="form-control form-control-sm" placeholder="write customer mobile no.">
                              </div>
                              <div class="form-group col-md-4">
                                <input type="text" name="address" id="address" class="form-control form-control-sm" placeholder="write customer address">
                             </div>
                           </div>
                         
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary purchaseStoreBtn">Invoice Store</button>
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
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#product_id').on('change',function(){
        var product_id = $(this).val();
        var url = '/check-product-stock/'+product_id;

        axios.get(url)
        .then(function (response) {
             $('#current_stock_qty').val(response.data);
        })
        .catch(function (error) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
          })
        })
      })
    })
  </script>

<script>
  $(document).ready(function(){
    $('#category_id').on('change',function(){
      var category_id = $(this).val();
      var html = '<option value="" selected disabled>select product</option>';
      var url = '/get-product/'+category_id;

      axios.get(url)
      .then(function (response) {
        $.each(response.data,function(key,v){
           html += '<option value="'+v.id+'">'+v.name+'</option>';
         })
         $('#product_id').html(html);
      })
      .catch(function (error) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong!',
        })
      })
    })
  })
</script>

<script id="document-template" type="text/x-handlebars-template">
  <tr class="delete_add_more_item" id="delete_add_more_item">
    <input type="hidden" name="date" value="@{{date}}">
    <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
    
    <td>
       <input type="hidden" name="category_id[]" value="@{{category_id}}">
       @{{category_name}}
    </td>
    <td>
      <input type="hidden" name="product_id[]" value="@{{product_id}}">
      @{{product_name}}
   </td>
   <td>
     <input type="number" min="1" name="selling_qty[]" value="1" class="form-control form-control-sm text-right selling_qty">
   </td>
   <td>
    <input type="number" name="unit_price[]" class="form-control form-control-sm text-right unit_price">
  </td>
  <td>
    <input type="text" name="selling_price[]" value="0" class="form-control form-control-sm text-right selling_price" readonly>
  </td>
  <td><i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i></td>
    
  </tr>

</script>

<script type="text/javascript">
   $(document).ready(function(){
     $(document).on('click','.addeventmore',function(){
        var date           = $('#date').val();
        var invoice_no     = $('#invoice_no').val();
        var category_id    = $('#category_id').val();
        var category_name  = $('#category_id').find('option:selected').text();
        var product_id     = $('#product_id').val();
        var product_name   = $('#product_id').find('option:selected').text();
         
         if(date==''){
           $.notify('Date is required',{globalPosition:'top right',className:'error'})
           return false;
         }
         if(category_id==''){
           $.notify('Category name is required',{globalPosition:'top right',className:'error'})
           return false;
         }
         if(product_id==''){
           $.notify('Product name is required',{globalPosition:'top right',className:'error'})
           return false;
         }

         var source = $('#document-template').html();
         var template = Handlebars.compile(source);

         var data = {
             date:date,
             invoice_no:invoice_no,
             category_id:category_id,
             product_id:product_id,
             category_name:category_name,
             product_name:product_name
         }
         var html = template(data);
         $('.addRow').append(html);
     })
     $(document).on('click','.removeeventmore',function(){
       $(this).closest('.delete_add_more_item').remove();
        totalAmountPrice();
     })

     $(document).on('keyup click','.unit_price,.selling_qty',function(){
       var unit_price = $(this).closest('tr').find('input.unit_price').val();
       var selling_qty = $(this).closest('tr').find('input.selling_qty').val();
       var total = (unit_price*selling_qty);
       $(this).closest('tr').find('input.selling_price').val(total);
        $('#discount_amount').trigger('keyup');
     })

     $(document).on('keyup','#discount_amount',function(){
        totalAmountPrice();
     })
     function totalAmountPrice(){
       var sum = 0;
       $('.selling_price').each(function(){
         var value = $(this).val();
         if(!isNaN(value) && value!=0){
           sum += parseFloat(value);
         }
       })
        var discount_amount = parseFloat($('#discount_amount').val());
         if(!isNaN(discount_amount) && discount_amount!=0){
           sum -= parseFloat(discount_amount);
         }
       $('.estimated_amount').val(sum);
     }

   })
</script>

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

{{-- new customer --}}

<script type="text/javascript">
  $(document).on('change','#customer_id',function(){
    var newCustomer = $(this).val();
    if(newCustomer == '0'){
      $('.new-customer').show();
    }else{
      $('.new-customer').hide();
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