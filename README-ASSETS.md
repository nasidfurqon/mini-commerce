# Template Assets Integration Guide

This document explains how to use the integrated template assets in your Laravel application.

## Asset Structure

All template assets have been organized in the `public/assets/` directory:

```
public/assets/
├── css/           # All CSS files including Bootstrap, icons, and custom styles
├── js/            # JavaScript libraries and custom scripts
├── fonts/         # Web fonts including Material Design Icons
└── images/        # All images, backgrounds, and icons
```

## Available CSS Files

### Core Styles
- `bootstrap.min.css` - Bootstrap framework
- `materialdesignicons.min.css` - Material Design Icons
- `style.min.css` - Main template styles
- `style-dark.min.css` - Dark theme variant
- `style-rtl.min.css` - RTL (Right-to-Left) support
- `style-dark-rtl.min.css` - Dark theme with RTL

### Plugin Styles
- `choices.min.css` - Custom select dropdowns
- `datepicker.min.css` - Date picker component
- `tiny-slider.css` - Image/content slider
- `tobii.min.css` - Lightbox gallery

## Available JavaScript Files

### Core Libraries
- `bootstrap.bundle.min.js` - Bootstrap JavaScript
- `feather.min.js` - Feather icons
- `app.js` - Main application script

### Plugins
- `choices.min.js` - Custom select functionality
- `datepicker.min.js` - Date picker functionality
- `gumshoe.polyfills.min.js` - Scroll spy navigation
- `shuffle.min.js` - Grid filtering and sorting
- `tiny-slider.js` - Slider functionality
- `tobii.min.js` - Lightbox functionality
- `contact.js` - Contact form handling
- `plugins.init.js` - Plugin initialization

## Usage Methods

### Method 1: Master Layout (Recommended for E-commerce Pages)

```php
@extends('layouts.master')

@section('title', 'Your Page Title')
@section('description', 'Page description for SEO')

@section('content')
    <!-- Your page content -->
@endsection

@push('styles')
    <!-- Additional CSS if needed -->
@endpush

@push('scripts')
    <!-- Additional JavaScript if needed -->
@endpush
```

### Method 2: App Layout (For Simple Pages)

```php
@extends('layouts.app')

@section('title', 'Simple Page')

@section('content')
    <!-- Your content -->
@endsection
```

### Method 3: Asset Loader Component (Flexible)

```php
<!-- Include in your view -->
<x-asset-loader 
    :theme="'light'"           <!-- 'light' or 'dark' -->
    :rtl="false"               <!-- true for RTL languages -->
    :additional-css="['custom.css']"
    :additional-js="['custom.js']"
    :include-bootstrap="true"
    :include-icons="true"
    :include-plugins="true"
/>
```

### Method 4: Direct Asset Links

```php
<!-- In your Blade template head -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">

<!-- Before closing body tag -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
```

## Using Images

All template images are available in `public/assets/images/`:

```php
<!-- Background images -->
<div style="background-image: url('{{ asset('assets/images/bg/01.jpg') }}')">

<!-- Regular images -->
<img src="{{ asset('assets/images/logo-dark.png') }}" alt="Logo">

<!-- Product images -->
<img src="{{ asset('assets/images/shop/product-1.jpg') }}" alt="Product">
```

## Theme Variants

### Dark Theme
Use `style-dark.min.css` instead of `style.min.css`:
```php
<link href="{{ asset('assets/css/style-dark.min.css') }}" rel="stylesheet">
```

### RTL Support
For right-to-left languages:
```php
<link href="{{ asset('assets/css/style-rtl.min.css') }}" rel="stylesheet">
<!-- Or for dark RTL -->
<link href="{{ asset('assets/css/style-dark-rtl.min.css') }}" rel="stylesheet">
```

## Best Practices

1. **Use the Master Layout** for full e-commerce pages with navigation and footer
2. **Use the Asset Loader Component** for flexible asset loading
3. **Optimize Loading** by only including necessary CSS/JS files
4. **Cache Assets** in production using Laravel's asset versioning
5. **Compress Images** for better performance

## Example Pages

Visit `/example` to see a demonstration of the integrated assets in action.

## Troubleshooting

### Assets Not Loading
1. Check if files exist in `public/assets/`
2. Verify Laravel's `APP_URL` is correctly set
3. Clear Laravel cache: `php artisan cache:clear`
4. Check file permissions

### Styling Issues
1. Ensure CSS files are loaded in correct order
2. Check for conflicting styles with existing Laravel CSS
3. Use browser developer tools to debug

### JavaScript Errors
1. Check browser console for errors
2. Ensure jQuery is loaded before plugins (if required)
3. Verify script loading order

## Support

For issues related to the template assets integration, check:
1. Laravel documentation for asset handling
2. Template documentation for component usage
3. Browser developer tools for debugging