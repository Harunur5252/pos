@extends('backend.layouts.master')

@section('title')
    Edit Product
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Product</h1>
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
          <section class="col-lg-8 connectedSortable">
           
            <div class="card">
              <div class="card-header">
                <h3>
                    Update Product
                    {{-- <a class="btn btn-success btn-sm float-right" href="{{route('products.view')}}"><i class="fa fa-list"></i>&nbsp;Product List</a> --}}
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Product DataTable</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{route('products.update')}}" method="POST" name="form">
                            @csrf
                            <div class="form-row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Supplier Name</label>
                                    <select name="supplier_id" id="" class="form-control">
                                        <option value="" selected disabled>select supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">{{$errors->has('supplier_id')?$errors->first('supplier_id'):''}}</span>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Unit Name</label>
                                    <select name="unit_id" id="" class="form-control">
                                        <option value="" selected disabled>select unit</option>
                                        @foreach ($units as $unit)
                                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">{{$errors->has('supplier_id')?$errors->first('supplier_id'):''}}</span>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Category Name</label>
                                    <select name="category_id" id="" class="form-control">
                                        <option value="" selected disabled>select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">{{$errors->has('supplier_id')?$errors->first('supplier_id'):''}}</span>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$product->name}}" placeholder="enter productname">
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <span style="color: red">{{$errors->has('name')?$errors->first('name'):''}}</span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
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

  <script>
    document.forms['form'].elements['supplier_id'].value = '{{$product->supplier_id}}';
  </script>

   <script>
    document.forms['form'].elements['unit_id'].value = '{{$product->unit_id}}';
  </script>

   <script>
    document.forms['form'].elements['category_id'].value = '{{$product->category_id}}';
  </script>

@endsection