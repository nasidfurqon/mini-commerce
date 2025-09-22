@extends('layouts.master')

@section('title', 'Example Page')
@section('description', 'This is an example page showing how to use the template assets')

@section('content')
<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url('{{ asset('assets/images/bg/01.jpg') }}') center center;">
    <div class="bg-overlay bg-gradient-overlay-2"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Welcome to {{ config('app.name') }}</h5>
                    <h4 class="display-4 fw-bold text-white title-dark mb-3">Modern E-Commerce Platform</h4>
                    <p class="para-desc mx-auto text-white-50">Discover amazing products with our beautiful and modern interface powered by the template assets.</p>
                    
                    <div class="mt-4 pt-2">
                        <a href="#" class="btn btn-primary">Shop Now</a>
                        <a href="#" class="btn btn-outline-primary ms-2">Learn More</a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Hero End -->

<!-- Features Start -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <h4 class="title mb-3">Template Assets Integration</h4>
                    <p class="text-muted mx-auto para-desc mb-0">All CSS, JavaScript, fonts, and images from the template are now available in your Laravel application.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card features feature-primary border-0 p-4 rounded-md shadow">
                    <div class="icon text-center rounded-md">
                        <i class="uil uil-css3-simple h3 mb-0"></i>
                    </div>
                    <div class="card-body p-0 mt-3">
                        <a href="#" class="title text-dark h5">CSS Assets</a>
                        <p class="text-muted mb-0">Bootstrap, Material Design Icons, and custom styles are all available in <code>/public/assets/css/</code></p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card features feature-primary border-0 p-4 rounded-md shadow">
                    <div class="icon text-center rounded-md">
                        <i class="uil uil-java-script h3 mb-0"></i>
                    </div>
                    <div class="card-body p-0 mt-3">
                        <a href="#" class="title text-dark h5">JavaScript Libraries</a>
                        <p class="text-muted mb-0">All JS plugins including Bootstrap, Feather Icons, and custom scripts in <code>/public/assets/js/</code></p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card features feature-primary border-0 p-4 rounded-md shadow">
                    <div class="icon text-center rounded-md">
                        <i class="uil uil-image h3 mb-0"></i>
                    </div>
                    <div class="card-body p-0 mt-3">
                        <a href="#" class="title text-dark h5">Images & Fonts</a>
                        <p class="text-muted mb-0">All images, icons, and font files are organized in <code>/public/assets/images/</code> and <code>/public/assets/fonts/</code></p>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->

<!-- Usage Examples Start -->
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <h4 class="title mb-3">How to Use</h4>
                    <p class="text-muted mx-auto para-desc mb-0">Here are different ways to include the template assets in your Laravel views.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-6 mt-4 pt-2">
                <div class="card border-0 shadow rounded-md">
                    <div class="card-body">
                        <h5 class="card-title">Method 1: Use Master Layout</h5>
                        <p class="text-muted">Extend the master layout for full e-commerce pages:</p>
                        <pre class="bg-light p-3 rounded"><code>@extends('layouts.master')

@section('title', 'Your Page Title')
@section('content')
    <!-- Your content here -->
@endsection</code></pre>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-6 mt-4 pt-2">
                <div class="card border-0 shadow rounded-md">
                    <div class="card-body">
                        <h5 class="card-title">Method 2: Use Asset Loader Component</h5>
                        <p class="text-muted">Include specific assets with the component:</p>
                        <pre class="bg-light p-3 rounded"><code>&lt;x-asset-loader 
    :theme="'dark'" 
    :rtl="false" 
    :additional-css="['custom.css']" 
/&gt;</code></pre>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row mt-4">
            <div class="col-12">
                <div class="card border-0 shadow rounded-md">
                    <div class="card-body">
                        <h5 class="card-title">Method 3: Direct Asset Links</h5>
                        <p class="text-muted">Include assets directly in your Blade templates:</p>
                        <pre class="bg-light p-3 rounded"><code>&lt;link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"&gt;
&lt;link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet"&gt;

&lt;script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"&gt;&lt;/script&gt;
&lt;script src="{{ asset('assets/js/app.js') }}"&gt;&lt;/script&gt;</code></pre>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
@endsection

@push('styles')
<style>
    .features .icon {
        height: 65px;
        width: 65px;
        background: rgba(47, 85, 212, 0.1);
        line-height: 65px;
    }
    
    pre {
        font-size: 0.875rem;
        overflow-x: auto;
    }
</style>
@endpush