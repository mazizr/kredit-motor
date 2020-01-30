<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/quixlab/images/favicon.png')}}">
    <!-- Pignose Calender -->
    <link href="{{asset('assets/quixlab/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{asset('assets/quixlab/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/quixlab/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <!-- DataTables -->
    <link href="{{asset('assets/quixlab/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{asset('assets/quixlab/css/style.css')}}" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/select2.min.css') }}">
    @yield('css')

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @include('layouts.backend.navbar-baru')
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('layouts.backend.sidebar-baru')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                @yield('content')
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('assets/jquery.min.js')}}"></script>
    <script src="{{asset('assets/jquery-ui.min.js')}}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script>
        jQuery.ready();
    </script>
    <!-- Select2 -->
    <script src="{{ asset('assets/select2.full.min.js') }}"></script>
    <script src="{{asset('assets/quixlab/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('assets/quixlab/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/quixlab/js/settings.js')}}"></script>
    <script src="{{asset('assets/quixlab/js/gleek.js')}}"></script>
    <script src="{{asset('assets/quixlab/js/styleSwitcher.js')}}"></script>

    <!-- Chartjs -->
    <script src="{{asset('assets/quixlab/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Circle progress -->
    <script src="{{asset('assets/quixlab/plugins/circle-progress/circle-progress.min.js')}}"></script>
    <!-- Morrisjs -->
    <script src="{{asset('assets/quixlab/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/quixlab/plugins/morris/morris.min.js')}}"></script>
    <!-- Pignose Calender -->
    <script src="{{asset('assets/quixlab/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/quixlab/plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
    <!-- ChartistJS -->
    <script src="{{asset('assets/quixlab/plugins/chartist/js/chartist.min.js')}}"></script>
    <script src="{{asset('assets/quixlab/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('assets/quixlab/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/quixlab/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/quixlab/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{ asset('assets/select2.full.min.js') }}"></script>
    <script src="{{asset('assets/quixlab/js/dashboard/dashboard-1.js')}}"></script>
    <script src="{{asset('assets/jquery.number.js')}}"></script>
    <script>
        $('.select2').select2({
            placeholder: "Pilih Kategori",
            maximumSelectionLength: 4
        });
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
    @yield('js')

</body>

</html>