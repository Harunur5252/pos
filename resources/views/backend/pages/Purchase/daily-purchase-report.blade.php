@extends('backend.layouts.master')

@section('title')
  Search Purchase
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Search Purchase</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Purchase</li>
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
                    {{-- <a class="btn btn-success btn-sm float-right" href="{{route('invoices.view')}}"><i class="fa fa-list"></i>&nbsp;Invoice List</a> --}}
                </h3>
              </div>
              <div class="card-body">
                <div class="card">
                    <div class="card-header">
                      {{-- <h3 class="card-title">Purchase DataTable</h3> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{route('daily.purchase.pdf')}}" method="GET" target="_blank" id="quickForm">
                            <div class="form-row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Start Date</label>
                                    <input type="text" name="start_date" class="form-control form-control-sm datepicker" id="start_date" readonly placeholder="YYYY-MM-DD">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">End Date</label>
                                    <input type="text" name="end_date" class="form-control form-control-sm datepicker1" id="end_date" readonly placeholder="YYYY-MM-DD">
                                </div>
                                <div class="mb-3 col-md-1" style="padding-top: 33px;">
                                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
              </div>
            </div>
        </div>
      </div>
    </section>
  </div>


  <script type="text/javascript">
    $(document).ready(function () {
    //   $.validator.setDefaults({
    //     submitHandler: function () {
    //       alert( "Form successful submitted!" );
    //     }
    //   });
      $('#quickForm').validate({
        rules: {
            start_date: {
            required: true,
          },
          end_date: {
            required: true,
          },
        },
        messages: {
            
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>

<script>
    $('.datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format:'yyyy-mm-dd'
    });
    $('.datepicker1').datepicker({
        uiLibrary: 'bootstrap4',
        format:'yyyy-mm-dd'
    });
</script>

@endsection