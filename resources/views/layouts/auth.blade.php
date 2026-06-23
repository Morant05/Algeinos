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
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/panel.css') }}" rel="stylesheet">
</head>
<body>

{{-- Preloader --}}
<div class="preloader">
    <img src="{{ asset('imagenes/icono.png') }}" class="lds-ripple" alt="Logo" width="37" height="48"/>
</div>

<div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
    <div class="auth-box p-4 bg-white rounded">
        @yield('content')
    </div>
</div>

{{-- jQuery --}}
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>

{{-- Bootstrap --}}
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<script>
    $(".preloader").fadeOut();
</script>

@yield('scripts')
</body>
</html>
