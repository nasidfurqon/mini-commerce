<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', 'E-Commerce')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    
    <!-- Material Design Icons -->
    <link href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">
    
    <!-- Choices CSS -->
    <link href="{{ asset('assets/css/choices.min.css') }}" rel="stylesheet" type="text/css">
    
    <!-- Date Picker CSS -->
    <link href="{{ asset('assets/css/datepicker.min.css') }}" rel="stylesheet" type="text/css">
    
    <!-- Tiny Slider CSS -->
    <link href="{{ asset('assets/css/tiny-slider.css') }}" rel="stylesheet" type="text/css">
    
    <!-- Tobii CSS -->
    <link href="{{ asset('assets/css/tobii.min.css') }}" rel="stylesheet" type="text/css">
    
    <!-- Main Style CSS -->
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet" type="text/css">
    
    <!-- Dark Mode CSS (Optional) -->
    @if(request()->has('dark') || session('theme') === 'dark')
        <link href="{{ asset('assets/css/style-dark.min.css') }}" rel="stylesheet" type="text/css">
    @endif
    
    <!-- RTL CSS (Optional) -->
    @if(app()->getLocale() === 'ar' || request()->has('rtl'))
        <link href="{{ asset('assets/css/style-rtl.min.css') }}" rel="stylesheet" type="text/css">
    @endif

    @stack('styles')
</head>

<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- JavaScript -->
    <!-- Bootstrap Bundle JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- Feather Icons -->
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    
    <!-- Choices JS -->
    <script src="{{ asset('assets/js/choices.min.js') }}"></script>
    
    <!-- Date Picker JS -->
    <script src="{{ asset('assets/js/datepicker.min.js') }}"></script>
    
    <!-- Gumshoe JS -->
    <script src="{{ asset('assets/js/gumshoe.polyfills.min.js') }}"></script>
    
    <!-- Shuffle JS -->
    <script src="{{ asset('assets/js/shuffle.min.js') }}"></script>
    
    <!-- Tiny Slider JS -->
    <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
    
    <!-- Tobii JS -->
    <script src="{{ asset('assets/js/tobii.min.js') }}"></script>
    
    <!-- Contact JS -->
    <script src="{{ asset('assets/js/contact.js') }}"></script>
    
    <!-- Plugins Init JS -->
    <script src="{{ asset('assets/js/plugins.init.js') }}"></script>
    
    <!-- Main App JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    @stack('scripts')
</body>
</html>