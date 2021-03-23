@extends('backend.layouts.master')

@section('title')
    View Product/Supplier Wise Stock
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Product/Supplier Wise Stock</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                                <strong>Supplier Wise Report</strong>
                                <input type="radio" name="supplier_product_wise" class="search_value" value="supplier_wise">&nbsp;&nbsp;

                                <strong>Product Wise Report</strong>
                                <input type="radio" name="supplier_product_wise" class="search_value" value="product_wise">&nbsp;&nbsp;
                            </div>
                        </div>
                        <div class="show_supplier" style="display: none;">
                            <form action="{{route('stocks.supplier.wise.report.pdf')}}" method="GET" id="quickForm">
                               <div class="form-row">
                                 <div class="col-md-8">
                                    <label for="">Supplier Name</label>
                                    <select name="supplier_id" id="supplier_id" class="form-control form-control-sm select2">
                                        <option value="" selected disabled>select supplier</option>
                                        @foreach ($suppliers as $supplier)
                                          <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">{{$errors->has('supplier_id')?$errors->first('supplier_id'):''}}</span>
                                 </div>
                                 <div class="col-sm-4" style="padding-top: 31px;">
                                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                 </div>
                               </div>
                            </form>
                        </div>

                        <div class="show_product mt-3" style="display: none;">
                            <form action="{{route('stocks.product.wise.report.pdf')}}" method="GET" id="quickForm">
                               <div class="form-row">
                                 <div class="col-md-6">
                                    <label class="form-label">Category Name</label>
                                    <select name="category_id" id="category_id" class="form-control select2 form-control-sm" style="width: 100%;">
                                        <option value="" selected disabled>select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">{{$errors->has('category_id')?$errors->first('category_id'):''}}</span>
                                 </div>
                                 <div class="col-md-6"><label class="form-label">Product Name</label>
                                    <select name="product_id" id="product_id" class="form-control select2 form-control-sm" style="width: 100%;">
                                        <option value="" selected disabled>select product</option>
                                    </select>
                                    <span style="color: red">{{$errors->has('product_id')?$errors->first('product_id'):''}}</span>
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
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

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

  <script>
      $(document).on('change','.search_value',function(e){
         var search_value = $(this).val();
         if(search_value == 'supplier_wise'){
             $('.show_supplier').show();
         }else{
            $('.show_supplier').hide();
         }
      })

      $(document).on('change','.search_value',function(e){
         var search_value = $(this).val();
         if(search_value == 'product_wise'){
             $('.show_product').show();
         }else{
            $('.show_product').hide();
         }
      })
  </script>


@endsection