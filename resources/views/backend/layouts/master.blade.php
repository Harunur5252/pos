
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/')}}backend_asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('/')}}backend_asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('/')}}backend_asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('/')}}backend_asset/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/')}}backend_asset/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('/')}}backend_asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('/')}}backend_asset/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('/')}}backend_asset/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('/')}}backend_asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/')}}backend_asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- jQuery -->
  <script src="{{asset('/')}}backend_asset/plugins/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('/')}}backend_asset/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('/')}}backend_asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <style>
    .notyfijs-corner{
      z-index: 10000 !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    @include('backend.Includes.navbar')
    @include('backend.Includes.sidebar')
    @yield('content')

    @if(session()->has('success'))
      <script>
        $(function(){
          $.notify("{{session()->get('success')}}",{globalPosition:'top right',className:'success'});
        })
      </script>
    @endif

    @if(session()->has('error'))
      <script>
        $(function(){
          $.notify("{{session()->get('error')}}",{globalPosition:'top right',className:'error'});
        })
      </script>
   @endif

   @include('backend.Includes.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/')}}backend_asset/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('/')}}backend_asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('/')}}backend_asset/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('/')}}backend_asset/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('/')}}backend_asset/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('/')}}backend_asset/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/')}}backend_asset/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('/')}}backend_asset/plugins/moment/moment.min.js"></script>
<script src="{{asset('/')}}backend_asset/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('/')}}backend_asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('/')}}backend_asset/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/')}}backend_asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}backend_asset/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/')}}backend_asset/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/')}}backend_asset/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="{{asset('/')}}backend_asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}backend_asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/')}}backend_asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}backend_asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- jquery-validation -->
<script src="{{asset('/')}}backend_asset/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset('/')}}backend_asset/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- page script -->
<script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
<!-- Select2 -->
<script src="{{asset('/')}}backend_asset/plugins/select2/js/select2.full.min.js"></script>
{{-- ckeditor js --}}
<script src="{{asset('/')}}backend_asset/ckeditor/ckeditor.js"></script>
<script src="{{asset('/')}}backend_asset/ckeditor/samples/js/sample.js"></script>

<!-- jquery-validation -->
<script src="{{asset('/')}}backend_asset/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset('/')}}backend_asset/plugins/jquery-validation/additional-methods.min.js"></script>




<script>
	initSample();
</script>
{{-- DataTable --}}
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
{{-- delete sweet alert --}}
<script>
  $(function(){
    $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link=$(this).attr('href');

      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href=link;
          swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      })
     
    })
  })
</script>

{{-- approve sweet alert --}}
<script>
  $(function(){
    $(document).on('click','#approve',function(e){
      e.preventDefault();
      var link=$(this).attr('href');

      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Do you approve it?',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href=link;
          swalWithBootstrapButtons.fire(
            'Approved!',
            'Your file has been approved.',
            'success'
          )
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      })
     
    })
  })
</script>
<script>
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImg').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0'])
    })
  })
</script>

<script>
  $(function(){
    $('.select2').select2()
  })
</script>
</body>
</html>
