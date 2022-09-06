<!DOCTYPE html>
<html lang="en" class="h-100">

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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="vh-100">

@yield('content')

<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/dlabnav-init.js') }}"></script>
<script src="{{ asset('js/styleSwitcher.js') }}"></script>

<script src="{{ asset('/js/global.js?v' . \Illuminate\Support\Str::random(8)) }}"></script>
<script src="{{ $js ?? '' }}"></script>

</body>
</html>
