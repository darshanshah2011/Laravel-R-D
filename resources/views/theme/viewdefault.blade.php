<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Data</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('../../theme/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('../../theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('../../theme/dist/css/adminlte.min.css')}}">

<!-- jQuery -->
<script src="{{asset('../../theme/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('../../theme/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('../../theme/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('../../theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('../../theme/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('../../theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('../../theme/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('../../theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('../../theme/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('../../theme/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('../../theme/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('../../theme/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('../../theme/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('../../theme/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('../../theme/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('../../theme/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    @include('theme.header')
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @include('theme.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
   @include('theme.footer')
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
  $(document).ready(function () {
    var table = $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "processing": true,
      "serverSide": true,
      "buttons": ["pdf"], 
        "ajax":{
                     "url": "{{ url('viewdetails') }}",
                     "dataType": "json"
                     "data": function (data){
                },
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "email" },
                { "data": "contactnumber" },
                { "data": "address" },
                { "data": "bloodgroup" }
            ],
          }
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>
</body>
</html>