{{-- Asset Loader Component --}}
{{-- Usage: <x-asset-loader :theme="'dark'" :rtl="false" :additional-css="['custom.css']" :additional-js="['custom.js']" /> --}}

@props([
    'theme' => 'light', // light, dark
    'rtl' => false,
    'additionalCss' => [],
    'additionalJs' => [],
    'includeBootstrap' => true,
    'includeIcons' => true,
    'includePlugins' => true
])

{{-- CSS Assets --}}
@if($includeBootstrap)
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
@endif

@if($includeIcons)
    <link href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">
@endif

@if($includePlugins)
    <link href="{{ asset('assets/css/choices.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/tiny-slider.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/tobii.min.css') }}" rel="stylesheet" type="text/css">
@endif

{{-- Main Style CSS --}}
@if($theme === 'dark' && $rtl)
    <link href="{{ asset('assets/css/style-dark-rtl.min.css') }}" rel="stylesheet" type="text/css">
@elseif($theme === 'dark')
    <link href="{{ asset('assets/css/style-dark.min.css') }}" rel="stylesheet" type="text/css">
@elseif($rtl)
    <link href="{{ asset('assets/css/style-rtl.min.css') }}" rel="stylesheet" type="text/css">
@else
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet" type="text/css">
@endif

{{-- Additional CSS Files --}}
@foreach($additionalCss as $css)
    <link href="{{ asset('assets/css/' . $css) }}" rel="stylesheet" type="text/css">
@endforeach

{{-- JavaScript Assets (to be placed before closing body tag) --}}
@push('scripts')
    @if($includeBootstrap)
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    @endif
    
    @if($includeIcons)
        <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    @endif
    
    @if($includePlugins)
        <script src="{{ asset('assets/js/choices.min.js') }}"></script>
        <script src="{{ asset('assets/js/datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/js/gumshoe.polyfills.min.js') }}"></script>
        <script src="{{ asset('assets/js/shuffle.min.js') }}"></script>
        <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
        <script src="{{ asset('assets/js/tobii.min.js') }}"></script>
        <script src="{{ asset('assets/js/contact.js') }}"></script>
        <script src="{{ asset('assets/js/plugins.init.js') }}"></script>
    @endif
    
    <script src="{{ asset('assets/js/app.js') }}"></script>
    
    {{-- Additional JS Files --}}
    @foreach($additionalJs as $js)
        <script src="{{ asset('assets/js/' . $js) }}"></script>
    @endforeach
@endpush