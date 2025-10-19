<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from techzaa.in/larkon/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Sep 2025 17:52:07 GMT -->
<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Dashboard | Larkon - Responsive Admin Dashboard Template</title>
     <!-- App favicon -->
     <link rel="shortcut icon" href="{{ asset('assets/images2/favicon.ico') }}">

     <!-- Vendor css (Require in all Page) -->
     <link href="{{ asset('assets/css2/vendor.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="{{ asset('assets/css2/icons.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- Font Awesome Icons -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!-- Bootstrap Icons -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

     <!-- Boxicons (for classes like bx bx-*) -->
     <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

     <!-- Iconify (for <iconify-icon> elements) -->
     <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>

     <!-- Feather Icons -->
     <script src="https://unpkg.com/feather-icons"></script>

     <!-- Lucide Icons -->
     <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

     <!-- App css (Require in all Page) -->
     <link href="{{ asset('assets/css2/app.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- Theme Config js (Require in all Page) -->
     <script src="{{ asset('assets/js2/config.js') }}"></script>
</head>
<body>
    
     <!-- START Wrapper -->
     <div class="wrapper">

          <!-- ========== Topbar Start ========== -->
          <header class="topbar">
               <div class="container-fluid">
                    <div class="navbar-header">
                         <div class="d-flex align-items-center">
                              <!-- Menu Toggle Button -->
                              <div class="topbar-item">
                                   <button type="button" class="button-toggle-menu me-2">
                                        <iconify-icon icon="solar:hamburger-menu-broken" class="fs-24 align-middle"></iconify-icon>
                                   </button>
                              </div>

                              <!-- Menu Toggle Button -->
                              <div class="topbar-item">
                                   <h4 class="fw-bold topbar-button pe-none text-uppercase mb-0">Welcome!</h4>
                              </div>
                         </div>
                    </div>
               </div>
          </header>


          <!-- ========== Topbar End ========== -->

          @include('Layout.Sidebar-Admin')

          <!-- ============================================================== -->
          <!-- Start Page Content here -->
          <!-- ============================================================== -->
          <div class="page-content">
               @include('Component.Alert')
               @yield('content')
          </div>
          @include('Component.Swal')
    </div>

     <!-- Vendor Javascript (Require in all Page) -->
     <script src="{{ asset('assets/js2/vendor.js') }}"></script>

     <!-- App Javascript (Require in all Page) -->
     <script src="{{ asset('assets/js2/app.js') }}"></script>

     <!-- Vector Map Js -->
     <script src="{{ asset('assets/css2/vendor/jsvectormap/js/jsvectormap.min.js') }}"></script>
     <script src="{{ asset('assets/css2/vendor/jsvectormap/maps/world-merc.js') }}"></script>
     <script src="{{ asset('assets/css2/vendor/jsvectormap/maps/world.js') }}"></script>

     <!-- Dashboard Js -->
     <script src="{{ asset('assets/js2/pages/dashboard.js') }}"></script>
            
</body>

</html>