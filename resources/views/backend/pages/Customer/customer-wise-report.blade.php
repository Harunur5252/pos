@extends('backend.layouts.master')

@section('title')
    View Customer Wise Report
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Customer Wise Report</h1>
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
                    Select Criteria
                    {{-- <a class="btn btn-success btn-sm float-right" target="_blank" href="{{route('products.report.pdf')}}"><i class="fa fa-download"></i>&nbsp;Download Pdf</a> --}}
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    {{-- <div class="card-header">
                      <h3 class="card-title">Product/Supplier Wise DataTable</h3>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                             <div class="col-md-12 text-center">
                                <strong>Customer Wise Credit Report</strong>
                                <input type="radio" name="customer_wise_report" class="search_value" value="customer_credit">&nbsp;&nbsp;

                                <strong>Customer Wise Paid Report</strong>
                                <input type="radio" name="customer_wise_report" class="search_value" value="customer_paid">&nbsp;&nbsp;
                            </div>
                        </div>
                        <div class="show_credit" style="display: none;">
                            <form action="{{route('customer.wise.credit.pdf')}}" method="GET" id="quickForm">
                                <div class="form-row">
                                 <div class="col-md-8">
                                     <label for="">Customer Name</label>
                                     <select name="customer_id" id="cus" class="form-control form-control-sm select2">
                                         <option value="" selected disabled>select customer</option>
                                         @foreach ($customers as $customer)
                                           <option value="{{$customer->id}}">{{$customer->name}}({{$customer->mobile_no}} - {{$customer->address}})</option>
                                         @endforeach
                                     </select>
                                     <p id="error"></p>
                                     <span style="color: red">{{$errors->has('customer_id')?$errors->first('customer_id'):''}}</span>
                                  </div>
                                  <div class="col-sm-4" style="padding-top: 31px;">
                                     <button type="submit" id="submit" class="btn btn-primary btn-sm">Search</button>
                                  </div>
                                </div>
                             </form>
                        </div>

                        <div class="show_paid" style="display: none;">
                            <form action="{{route('customer.wise.paid.pdf')}}" method="GET" id="quickForm">
                               <div class="form-row">
                                <div class="col-md-8">
                                    <label for="">Customer Name</label>
                                    <select name="customer_id"  class="form-control form-control-sm select2">
                                        <option value="" selected disabled>select customer</option>
                                        @foreach ($customers as $customer)
                                          <option value="{{$customer->id}}">{{$customer->name}}({{$customer->mobile_no}} - {{$customer->address}})</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">{{$errors->has('customer_id')?$errors->first('customer_id'):''}}</span>
                                 </div>
                                 <div class="col-sm-4" style="padding-top: 31px;">
                                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                 </div>
                               </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
              </div>
            </div>
        </div>
      </div>
    </section>
  </div>

  <script>
    //   $(function(){
    //     var a = $('#cus').val();
              
    //           if(a==null){
    //             $('#submit').click(function(e){
    //               $('#error').text('field is required');
    //               e.preventDefault();
    //             })
    //           }else{
    //             $('#submit').click(function(e){
    //                 $(this).submit();
    //             })
    //           }
    //   })
      $(document).on('change','.search_value',function(e){
         var search_value = $(this).val();
         if(search_value == 'customer_credit'){
             $('.show_credit').show();
         }else{
            $('.show_credit').hide();
         }
      })

      $(document).on('change','.search_value',function(e){
         var search_value = $(this).val();
         if(search_value == 'customer_paid'){
             $('.show_paid').show();
         }else{
            $('.show_paid').hide();
         }
      })
  </script>


@endsection