<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="e-Pugo: IoT-Based Quail Management System">
    <meta property="og:title" content="e-Pugo: IoT-Based Quail Management System">
    <meta property="og:description" content="e-Pugo: IoT-Based Quail Management System">
    <meta property="og:image" content="{{ asset('images/quail.png') }}">
    <meta name="format-detection" content="telephone=no">

    <title>{{ $title ?? env('APP_NAME') }}</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/nouislider/nouislider.min.css') }}">

    <!-- Datatable -->
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

</head>
<body>

<div id="preloader">
    <div class="lds-ripple">
        <div></div>
        <div></div>
    </div>
</div>

<div id="main-wrapper">
    @include('partials._nav-header')
    @include('partials._header')
    @include('partials._sidebar')
    <div class="content-body">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    @include('partials._footer')
</div>

<!-- Required vendors -->
<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

<script src="{{ asset('vendor/owl-carousel/owl.carousel.js') }}"></script>

<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/dlabnav-init.js') }}"></script>
<script src="{{ asset('js/styleSwitcher.js') }}"></script>

<script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

<!-- Datatable -->
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('/js/global.js?v' . \Illuminate\Support\Str::random(8)) }}"></script>
<script src="{{ $js ?? '' }}"></script>

</body>
</html>
