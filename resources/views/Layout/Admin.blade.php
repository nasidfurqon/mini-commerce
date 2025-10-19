<!DOCTYPE html>
<html lang="en">



<head>
     
     <meta charset="utf-8" />
     <title>Dashboard | Larkon - Responsive Admin Dashboard Template</title>
     
     <link rel="shortcut icon" href="{{ asset('assets/images2/favicon.ico') }}">

     
     <link href="{{ asset('assets/css2/vendor.min.css') }}" rel="stylesheet" type="text/css" />

     
     <link href="{{ asset('assets/css2/icons.min.css') }}" rel="stylesheet" type="text/css" />

     
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

     
     <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

     
     <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>

     
     <script src="https://unpkg.com/feather-icons"></script>

     
     <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

     
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700;800&display=swap" rel="stylesheet">

     
     <link href="{{ asset('assets/css2/app.min.css') }}" rel="stylesheet" type="text/css" />

     
     <script src="{{ asset('assets/js2/config.js') }}"></script>
</head>
<body>
    
     
     <div class="wrapper">

          
          <header class="topbar">
               <div class="container-fluid">
                    <div class="navbar-header">
                         <div class="d-flex align-items-center">
             

                              
                              <div class="topbar-item">
                                   <h4 class="fw-bold topbar-button pe-none text-uppercase mb-0">Dashboard Admin</h4>
                              </div>
                         </div>
                    </div>
               </div>
          </header>


          

          @include('Layout.Sidebar-Admin')

          
          
          
          <div class="page-content">
               @include('Component.Alert')
               @yield('content')
          </div>
          @include('Component.Swal')
    </div>

     
     <script src="{{ asset('assets/js2/vendor.js') }}"></script>

     
     <script src="{{ asset('assets/js2/app.js') }}"></script>

     
     <script src="{{ asset('assets/css2/vendor/jsvectormap/js/jsvectormap.min.js') }}"></script>
     <script src="{{ asset('assets/css2/vendor/jsvectormap/maps/world-merc.js') }}"></script>
     <script src="{{ asset('assets/css2/vendor/jsvectormap/maps/world.js') }}"></script>

     
     <script src="{{ asset('assets/js2/pages/dashboard.js') }}"></script>
            
</body>

</html>