@extends('backend.layouts.master')

@section('title')
    View Category
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                    Category List
                    <a class="btn btn-success btn-sm float-right" href="{{route('categories.add')}}"><i class="fa fa-plus-circle"></i>&nbsp;Add Category</a>
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Category DataTable</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>SI NO#</th>
                          <th>Category Name</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ( $allCategories as  $key=>$category) 
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$category->name}}</td>
                                @php
                                   $count_category = App\Model\Product::where('category_id',$category->id)->count();
                                @endphp
                                <td>
                                    <a href="{{route('categories.edit',[$category->id])}}" class="btn btn-success btn-sm">Edit</a>
                                    @if($count_category<1)
                                      <a href="{{route('categories.delete',[$category->id])}}" id="delete" class="btn btn-danger btn-sm">Delete</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SI NO#</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
              </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection