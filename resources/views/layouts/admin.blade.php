<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('pageTitle') | My-Blog</title>
    <!-- CSS files -->
    <base href="/">
    <link href="{{asset('dist/css/tabler.min.css?1684106062')}}" rel="stylesheet" />
    <link href="{{asset('dist/css/tabler-flags.min.css?1684106062')}}" rel="stylesheet" />
    <link href="{{asset('dist/css/tabler-payments.min.css?1684106062')}}" rel="stylesheet" />
    <link href="{{asset('dist/css/tabler-vendors.min.css?1684106062')}}" rel="stylesheet" />
    <link href="{{asset('dist/css/demo.min.css?1684106062')}}" rel="stylesheet" />
    @yield('stylesheets')
</head>

<body>
<script src="{{asset('dist/js/demo-theme.min.js?1684106062')}}"></script>
<div class="page">
    <!-- Navbar -->
    @include('partials.header')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                @yield('pageHeader')
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                @yield('content')
            </div>
        </div>
        <!-- Page footer -->
        @include('partials.footer')

    </div>
</div>

<!-- Libs JS -->
<script src="{{asset('dist/libs/apexcharts/dist/apexcharts.min.js?1684106062')}}" defer></script>
<script src="{{asset('dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062')}}" defer></script>
<script src="{{asset('dist/libs/jsvectormap/dist/maps/world.js?1684106062')}}" defer></script>
<script src="{{asset('dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062')}}" defer></script>
<!-- Tabler Core -->
<script src="{{asset('dist/js/tabler.min.js?1684106062')}}" defer></script>
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{asset('dist/js/demo.min.js?1684106062')}}" defer></script>
@yield('scripts')

</body>

</html>
