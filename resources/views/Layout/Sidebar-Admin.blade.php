<div class="main-nav">
               
               <div class="px-3 py-3">
                    <a href="{{ route('index') }}" class="d-flex align-items-center text-decoration-none">
                         <span class="brand-text text-white fw-bold fs-3" style="letter-spacing: .5px; font-family: 'Poppins', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif;">AyceTechStore</span>
                    </a>
               </div>


               <div class="scrollbar" data-simplebar>
                    <ul class="navbar-nav" id="navbar-nav">

                         <li class="menu-title">General</li>

            
                         <li class="nav-item">
                              <a class="nav-link" href="{{ route('admin.categories.index') }}"  role="button" aria-expanded="false" aria-controls="sidebarProducts">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:t-shirt-bold-duotone"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Products </span>
                              </a>               
                         </li>       
                         <li class="nav-item">
                              <a class="nav-link" href="{{ route('admin.orders.index') }}"  role="button" aria-expanded="false" aria-controls="sidebarOrders">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:bag-smile-bold-duotone"></iconify-icon>
                                   </span>
                                   <span class="nav-text"> Orders </span>
                              </a>
                         </li>                              

                         <li class="nav-item">
                              <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                   @csrf
                                   <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                                        <span class="nav-icon">
                                             <iconify-icon icon="solar:logout-bold-duotone"></iconify-icon>
                                        </span>
                                        <span class="nav-text"> Logout </span>
                                   </a>
                              </form>
                         </li>
                    </ul>
               </div>
          </div>