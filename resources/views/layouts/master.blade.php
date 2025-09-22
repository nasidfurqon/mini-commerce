<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', 'E-Commerce')</title>
    <meta name="description" content="@yield('description', 'Modern E-Commerce Platform')">

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

    @stack('styles')
</head>

<body>
    <!-- Loader Start -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- Loader End -->

    <!-- Navbar Start -->
    <header id="topnav" class="defaultscroll sticky">
        <div class="container">
            <!-- Logo container-->
            <a class="logo" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo-dark.png') }}" height="24" class="logo-light-mode" alt="">
                <img src="{{ asset('assets/images/logo-light.png') }}" height="24" class="logo-dark-mode" alt="">
            </a>

            <!-- End Logo container-->
            <div class="menu-extras">
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

            <!--Login button Start-->
            <ul class="buy-button list-inline mb-0">
                <li class="list-inline-item mb-0">
                    <div class="dropdown">
                        <button type="button" class="btn btn-link text-decoration-none dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="uil uil-search text-dark fs-5 align-middle me-1"></i>
                        </button>
                        <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3" style="min-width: 300px;">
                            <form>
                                <input type="text" id="text" name="name" class="form-control border bg-white" placeholder="Search...">
                            </form>
                        </div>
                    </div>
                </li>

                <li class="list-inline-item ps-1 mb-0">
                    <a href="{{ route('cart') }}" class="btn btn-link text-decoration-none p-0">
                        <i class="uil uil-shopping-bag text-dark fs-5 align-middle"></i>
                        <span class="badge bg-primary rounded-pill ms-1">{{ session('cart_count', 0) }}</span>
                    </a>
                </li>

                @auth
                    <li class="list-inline-item ps-1 mb-0">
                        <div class="dropdown dropdown-primary">
                            <button type="button" class="btn btn-pills btn-soft-primary dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('assets/images/client/05.jpg') }}" class="avatar avatar-ex-small rounded-circle" alt="">
                            </button>
                            <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3" style="min-width: 200px;">
                                <a class="dropdown-item d-flex align-items-center text-dark" href="{{ route('profile') }}">
                                    <img src="{{ asset('assets/images/client/05.jpg') }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                    <div class="flex-1 ms-2">
                                        <span class="d-block mb-1">{{ auth()->user()->name }}</span>
                                        <small class="text-muted">{{ auth()->user()->email }}</small>
                                    </div>
                                </a>
                                <div class="dropdown-divider border-top"></div>
                                <a class="dropdown-item text-dark" href="{{ route('profile') }}"><span class="mb-0 d-inline-block me-1"><i class="uil uil-setting align-middle h6"></i></span> Profile Settings</a>
                                <div class="dropdown-divider border-top"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="uil uil-sign-out-alt align-middle h6"></i></span> Logout</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @else
                    <li class="list-inline-item ps-1 mb-0">
                        <a href="{{ route('login') }}" class="btn btn-pills btn-soft-primary">Login</a>
                    </li>
                @endauth
            </ul>
            <!--Login button End-->

            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu nav-left">
                    <li><a href="{{ route('home') }}" class="sub-menu-item">Home</a></li>
                    <li><a href="{{ route('products') }}" class="sub-menu-item">Products</a></li>
                    <li><a href="{{ route('categories') }}" class="sub-menu-item">Categories</a></li>
                    <li><a href="{{ route('about') }}" class="sub-menu-item">About</a></li>
                    <li><a href="{{ route('contact') }}" class="sub-menu-item">Contact</a></li>
                </ul><!--end navigation menu-->
            </div><!--end navigation-->
        </div><!--end container-->
    </header><!--end header-->
    <!-- Navbar End -->

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-py-60">
                        <div class="row">
                            <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                                <a href="#" class="logo-footer">
                                    <img src="{{ asset('assets/images/logo-light.png') }}" height="24" alt="">
                                </a>
                                <p class="para-desc text-muted mt-4">{{ config('app.name') }} adalah platform e-commerce modern yang menyediakan berbagai produk berkualitas dengan pengalaman berbelanja yang menyenangkan.</p>
                                <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="uil uil-shopping-bag align-middle" title="Buy Now"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="uil uil-dribbble align-middle" title="dribbble"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="uil uil-behance align-middle" title="behance"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="uil uil-instagram align-middle" title="instagram"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="uil uil-twitter align-middle" title="twitter"></i></a></li>
                                </ul><!--end icon-->
                            </div><!--end col-->
                            
                            <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                <h5 class="footer-head">Company</h5>
                                <ul class="list-unstyled footer-list mt-4">
                                    <li><a href="{{ route('about') }}" class="text-muted"><i class="uil uil-angle-right-b me-1"></i> About us</a></li>
                                    <li><a href="{{ route('contact') }}" class="text-muted"><i class="uil uil-angle-right-b me-1"></i> Contact us</a></li>
                                    <li><a href="#" class="text-muted"><i class="uil uil-angle-right-b me-1"></i> Services</a></li>
                                    <li><a href="#" class="text-muted"><i class="uil uil-angle-right-b me-1"></i> Team</a></li>
                                </ul>
                            </div><!--end col-->
                            
                            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                <h5 class="footer-head">Useful Links</h5>
                                <ul class="list-unstyled footer-list mt-4">
                                    <li><a href="#" class="text-muted"><i class="uil uil-angle-right-b me-1"></i> Terms of Services</a></li>
                                    <li><a href="#" class="text-muted"><i class="uil uil-angle-right-b me-1"></i> Privacy Policy</a></li>
                                    <li><a href="#" class="text-muted"><i class="uil uil-angle-right-b me-1"></i> Documentation</a></li>
                                    <li><a href="#" class="text-muted"><i class="uil uil-angle-right-b me-1"></i> Changelog</a></li>
                                </ul>
                            </div><!--end col-->

                            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                <h5 class="footer-head">Newsletter</h5>
                                <p class="text-muted">Sign up and receive the latest tips via email.</p>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="foot-subscribe mb-3">
                                                <label class="form-label">Write your email <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                                    <input type="email" name="email" id="emailsubscribe" class="form-control ps-5 rounded" placeholder="Your email : " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-grid">
                                                <input type="submit" id="submitsubscribe" name="send" class="btn btn-soft-primary" value="Subscribe">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="footer-py-30 footer-bar">
            <div class="container text-center">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="text-sm-start">
                            <p class="mb-0">© {{ date('Y') }} {{ config('app.name') }}. Design with <i class="mdi mdi-heart text-danger"></i> by <a href="#" target="_blank" class="text-reset">Your Team</a>.</p>
                        </div>
                    </div><!--end col-->

                    <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <ul class="list-unstyled text-sm-end mb-0">
                            <li class="list-inline-item"><a href="#"><img src="{{ asset('assets/images/payments/american-ex.png') }}" class="avatar avatar-ex-sm" title="American Express" alt=""></a></li>
                            <li class="list-inline-item"><a href="#"><img src="{{ asset('assets/images/payments/discover.png') }}" class="avatar avatar-ex-sm" title="Discover" alt=""></a></li>
                            <li class="list-inline-item"><a href="#"><img src="{{ asset('assets/images/payments/master-card.png') }}" class="avatar avatar-ex-sm" title="Master Card" alt=""></a></li>
                            <li class="list-inline-item"><a href="#"><img src="{{ asset('assets/images/payments/paypal.png') }}" class="avatar avatar-ex-sm" title="Paypal" alt=""></a></li>
                            <li class="list-inline-item"><a href="#"><img src="{{ asset('assets/images/payments/visa.png') }}" class="avatar avatar-ex-sm" title="Visa" alt=""></a></li>
                        </ul>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </div>
    </footer><!--end footer-->
    <!-- Footer End -->

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
    <!-- Back to top -->

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