<!doctype html>
<html lang="tr" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('assets/castle/images/favicon-32x32.png')}}" type="image/png" />
    <!--plugins-->
    <link href="{{asset('assets/castle/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/castle/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/castle/plugins/datetimepicker/css/classic.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/castle/plugins/datetimepicker/css/classic.time.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/castle/plugins/datetimepicker/css/classic.date.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/castle/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css')}}">
    <link href="{{asset('assets/castle/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/castle/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/castle/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/castle/css/bootstrap-extended.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/castle/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/castle/css/icons.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    <!-- loader-->
    <link href="{{asset('assets/castle/css/pace.min.css')}}" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="{{asset('assets/castle/css/dark-theme.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/castle/css/light-theme.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/castle/css/semi-dark.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/castle/css/header-colors.css')}}" rel="stylesheet" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
    <!-- Bootstrap-Iconpicker -->
    <link rel="stylesheet" href="{{asset('assets/castle/css/bootstrap-iconpicker.min.css')}}"/>
    <title>@yield('title')</title>
</head>

<body>


<!--start wrapper-->
<div class="wrapper">
    <!--start top header-->
    @include('castle.layouts.header')
    <!--end top header-->

    <!--start sidebar -->
    @include('castle.layouts.sidebar')
    <!--end sidebar -->

    <!--start content-->
    @yield('castle')
    <!--end page main-->

    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

    <!--start switcher-->
    @include('castle.layouts.swicher')
    <!--end switcher-->

</div>
<!--end wrapper-->


<!-- Bootstrap bundle JS -->
<script src="{{asset('assets/castle/js/bootstrap.bundle.min.js')}}"></script>
<!--plugins-->
<script src="{{asset('assets/castle/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/castle/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('assets/castle/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/castle/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/castle/js/pace.min.js')}}"></script>
<script src="{{asset('assets/castle/plugins/chartjs/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/castle/plugins/chartjs/js/Chart.extension.js')}}"></script>
<script src="{{asset('assets/castle/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
<!-- Vector map JavaScript -->
<script src="{{asset('assets/castle/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('assets/castle/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!--app-->
<script src="{{asset('assets/castle/js/app.js')}}"></script>
<script src="{{asset('assets/castle/js/index.js')}}"></script>
<script>
    new PerfectScrollbar(".review-list")
    new PerfectScrollbar(".chat-talk")
</script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<!-- jQuery CDN -->
<!-- Bootstrap CDN -->
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap-Iconpicker Bundle -->
<script type="text/javascript" src="{{asset('assets/castle/js/bootstrap-iconpicker.bundle.min.js')}}"></script>

<script src="{{asset('assets/castle/plugins/datetimepicker/js/legacy.js')}}"></script>
<script src="{{asset('assets/castle/plugins/datetimepicker/js/picker.js')}}"></script>
<script src="{{asset('assets/castle/plugins/datetimepicker/js/picker.time.js')}}"></script>
<script src="{{asset('assets/castle/plugins/datetimepicker/js/picker.date.js')}}"></script>
<script src="{{asset('assets/castle/plugins/bootstrap-material-datetimepicker/js/moment.min.js')}}"></script>
<script src="{{asset('assets/castle/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/castle/js/form-date-time-pickes.js')}}"></script>
</body>

</html>
