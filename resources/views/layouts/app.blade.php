<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="robots" content="noindex,nofollow"/>

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Favicon --}}
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="{{ asset('imagenes/favicon.png') }}"
    />

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('dist/css/icons/flag-icon-css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/panel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/telefono.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mantenimiento.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/intro.js/minified/introjs.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.2.0/leaflet.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.5/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/perliedman-leaflet-control-geocoder/1.5.5/Control.Geocoder.min.css" />
    <script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.4.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.2.0/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.5/leaflet-routing-machine.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/perliedman-leaflet-control-geocoder/1.5.5/Control.Geocoder.min.js"></script>
</head>
<body>

{{-- Preloader --}}
<div class="preloader">
    <img src="{{ asset('imagenes/icono.png') }}" class="lds-ripple" alt="Logo" width="37" height="48"/>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<div id="main-wrapper">
    @include('layouts.header')
    @include('layouts.sidebar')

    <div class="page-wrapper">
        @include('layouts.breadcrumbs')

        <div class="container-fluid">
            @include('layouts.alerts')
            @yield('content')
        </div>

        @include('layouts.footer')
        @include('layouts.modals')
    </div>
</div>

{{-- jQuery --}}
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>

{{-- Bootstrap --}}
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

{{-- apps --}}
<script src="{{ asset('dist/js/app.min.js') }}"></script>
<script src="{{ asset('dist/js/app.init.js') }}"></script>
<script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>

{{-- slimscrollbar scrollbar JavaScript --}}
<script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>

{{-- Wave Effects --}}
<script src="{{-- dist/js/waves.js --}}"></script>

{{-- Menu sidebar --}}
<script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>

{{-- Custom JavaScript --}}
<script src="{{ asset('dist/js/feather.min.js') }}"></script>
<script src="{{ asset('dist/js/custom.min.js') }}"></script>

@yield('scripts')
@include('layouts.scripts')

</body>
</html>
