<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/FrontEnd/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/FrontEnd/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/FrontEnd/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/FrontEnd/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/FrontEnd/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/FrontEnd/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/FrontEnd/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/FrontEnd/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/FrontEnd/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/FrontEnd/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/FrontEnd/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/FrontEnd/css/style.css') }}">
    @yield('css')
</head>
<body>
    <!-- bagian Navbar -->
    @include('layouts.frontend.navbar')
    <!-- navbar end -->
    
    @yield('content')

    @include('layouts.frontend.footer')

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{ asset('assets/FrontEnd/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/FrontEnd/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('assets/FrontEnd/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/FrontEnd/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/FrontEnd/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets/FrontEnd/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/FrontEnd/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/FrontEnd/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/FrontEnd/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/FrontEnd/js/aos.js') }}"></script>
<script src="{{ asset('assets/FrontEnd/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('assets/FrontEnd/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/FrontEnd/js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('assets/FrontEnd/js/google-map.js') }}"></script>
<script src="{{ asset('assets/FrontEnd/js/main.js') }}"></script>
@yield('js')
</body>
</html>