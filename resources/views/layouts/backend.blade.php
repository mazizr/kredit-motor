<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Kremo | @stack('title')</title>
  <link rel="icon" href="{{ asset('image/icon.ico') }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('assets/backendnya/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/backendnya/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/backendnya/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/backendnya/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('assets/backendnya/dist/css/skins/_all-skins.min.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="http://apro-admin-templates.websitedesignmarketingagency.com/aproadmin/assets/vendor_plugins/iCheck/all.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('assets/backendnya/bower_components/morris.js/morris.css') }}">
  <!-- Color Picker -->
  <link rel="stylesheet" href="{{ asset('assets/backendnya/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('assets/backendnya/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/backendnya/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('assets/backendnya/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <style>
      .kepala{
          background-image: url("{{ asset('image/kedua.jpg') }}");
          background-size: 100%;
      }

      .dataTables_filter {
        margin-left: 337px;
      }

      .dataTables_paginate{
        margin-left: 420px;
      }
  </style>
  <style>
      .teks-putih{
          color: white;
          font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- DataTable -->
  <link rel="stylesheet" href="{{ asset('datatables.min.css')}}">
  <link href="{{ asset('dataTables.bootstrap4.css')}}" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/backendnya/bower_components/select2/dist/css/select2.min.css') }}">
  @yield('css')
</head>
<body class="hold-transition skin-purple sidebar-mini fixed">

@auth
<div class="wrapper">
@endauth
    @include('layouts.backend-baru.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<br/>
    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@auth
</div>
@endauth
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="{{ asset('assets/backendnya/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/backendnya/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script>
        jQuery.ready();
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/backendnya/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('assets/backendnya/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/backendnya/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/backendnya/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/backendnya/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/backendnya/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/backendnya/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('assets/backendnya/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('assets/backendnya/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('assets/backendnya/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/backendnya/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/backendnya/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/backendnya/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/backendnya/dist/js/demo.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('datatables.min.js')}}"></script>
<script src="{{ asset('dataTables.bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/backendnya/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('js/repeater.js') }}"></script>
<!-- Color Picker -->
<script src="{{ asset('assets/backendnya/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<script>
    $('.datepicker').datepicker({
        autoclose: true,
        zIndex: 999999,
        format: 'dd-mm-yyyy',
        autoclose: true,
        changeMonth: true,
        changeYear: true,
    });
</script>
<script src="{{ asset('js/jquery.number.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="http://apro-admin-templates.websitedesignmarketingagency.com/aproadmin/assets/vendor_plugins/iCheck/icheck.min.js"></script>
<!-- page script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
  $('.select2').select2({});
</script>
<script>
    $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
    });
    $(".hanya-huruf").keypress(function(event){
        var inputValue = event.which;
        // allow letters and whitespaces only.
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) {
            event.preventDefault();
        }
    });

</script>
<!-- Page script -->
  <script>
    $(function () {

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

    })
  </script>
@yield('js')
</body>
</html>
