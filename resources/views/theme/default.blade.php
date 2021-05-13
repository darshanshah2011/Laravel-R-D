<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Form</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('../../theme/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('../../theme/dist/css/adminlte.min.css')}}">
  <!-- jQuery -->
<script src="{{asset('../../theme/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('../../theme/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('../../theme/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('../../theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- jquery-validation -->
<script src="{{asset('../../theme/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('../../theme/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('../../theme/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('../../theme/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
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
function demo() {
  $('#exampleInputName').keyup(function () { 
    this.value = this.value.replace(/[^a-zA-Z\.]/g,'');
});


  $('#quickForm').validate({
    rules: {
      name: {
        required: true,
        digits:false
      },
      email: {
        required: true,
        email: true,
      },
      address: {
        required: true,
      },
      contactnumber: {
        required: true,
        maxlength: 10,
        digits: true,
      },
      bloodgroup: {
        required: true,
      },
      // terms: {
      //   required: true
      // },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      contactnumber: {
        required: "Please provide a contact number",
        minlength: "Your contactnumber must be at least 10 digits long"
      },
      name: {
        required: "Please provide a name",
        name:"digits not allowed"
      },
       address: {
        required: "Please provide a valid address with city and state name",
      },
      bloodgroup: {
        required: "Please select your bloodgroup",
      },
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
    },
    submitHandler: function (form) {
        var URL = $("#quickForm").attr("action");
        var TYPE = $("#quickForm").attr("method");
        $.ajax({
             url: URL, 
             type: TYPE,             
             data: $("#quickForm").serialize(),
             cache: false,         
             processData: false,      
             success: function(data) {
                window.location = "viewdetails";
                  
             }
        });
        return false;
    },
  });
};
</script>
</body>
</html>