<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from template.hasthemes.com/furns/furns/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Sep 2025 19:05:43 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Furns - Furniture eCommerce HTML Template</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/vendor.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/modern-order-summary.css') }}">
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Header Area start  -->
    <div class="header section">
        <!-- Header Bottom  Start -->
        <div class="header-bottom d-none d-lg-block">
            <div class="container position-relative">
                <div class="row align-self-center">
                    <!-- Header Logo Start -->
                    <div class="col-auto align-self-center">
               <div class="px-3 py-3">
                    <a href="{{ route('index') }}" class="d-flex align-items-center text-decoration-none">
                         <span class="brand-text fw-bold fs-3" style="letter-spacing: .5px; font-family: 'Poppins', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif;">AyceTechStore</span>
                    </a>
               </div>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Action Start -->
                    <div class="col align-self-center">
                        <div class="header-actions">
                            <div class="header_account_list">
                                <a href="javascript:void(0)" class="header-action-btn search-btn"><i
                                        class="icon-magnifier"></i></a>
                                <div class="dropdown_search">
                                    <form class="action-form" action="{{ route('shop', 'all') }}" method="GET">
                                        <input class="form-control" placeholder="Enter your search key" type="text" name="search" value="{{ request('search') }}">
                                        <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!-- Single Wedge Start -->
                            <div class="header-bottom-set dropdown">
                                <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown"><i
                                        class="icon-user"></i></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    @if($isAuthenticated)
                                        @if($canAccessAdmin)
                                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                                        @endif
                                        @if($canAccessUserFeatures)
                                            <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                        @endif
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="dropdown-item" style="border: none; background: none; width: 100%; text-align: left;">Logout ({{ $userDisplayName }})</button>
                                            </form>
                                        </li>
                                    @else
                                        <li><a class="dropdown-item" href="{{ route('auth.page') }}">Login / Register</a></li>
                                    @endif
                                </ul>
                            </div>
                            <!-- Single Wedge End -->
                            @if($canAccessCart)                           
                            <!-- Cart Button -->
                            <a href="#cartPreviewModal" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                <i class="icon-handbag"></i>
                                <span class="header-action-num">{{ $cartCount ?? 0}}</span>
                                <!-- <span class="cart-amount">€30.00</span> -->
                            </a>
                            
                            @endif
                            @include('Partial.Cart-Preview')
                            
                        </div>
                    </div>
                    <!-- Header Action End -->
                </div>
            </div>
        </div>

        <!-- Main Menu Start -->
        <div class="bg-black d-none d-lg-block sticky-nav">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12 align-self-center">
                        <div class="main-menu">
                            <ul>
                                <li class="dropdown"><a href="{{ route('index') }}">Home</a></li>
                                <li><a href="{{ route('shop',['category'=>'all']) }}">Shop</a></li>                         
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Menu End -->
    </div>

    @yield('content')

    <!-- AJAX SCRIPT -->
    <script>
    (function(){
        const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        document.addEventListener('click', function(e){
            // Add to cart handler (existing)
            const addBtn = e.target.closest && e.target.closest('.ajax-add-to-cart');
            if (addBtn) {
                e.preventDefault();
                const productId = addBtn.dataset.productId;
                const qtyInput = addBtn.closest('.pro-details-quality')?.querySelector('.cart-plus-minus-box');
                const qty = qtyInput ? parseInt(qtyInput.value) || 1 : (addBtn.dataset.qty || 1);

                if (!productId) return;
                fetch("{{ route('user.cart.add') }}", {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ product_id: productId, qty: qty })
                })
                .then(r => r.json())
                .then(handleCartResponse)
                .catch(err => console.error('Add to cart failed', err));
                return;
            }

            // Decrement button handler
            const decBtn = e.target.closest && e.target.closest('.decrement');
            if (decBtn) {
                e.preventDefault();
                const cartItemId = decBtn.dataset.cartItemId;
                if (!cartItemId) return;
                fetch("{{ route('cart.item.decrement') }}", {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ cart_item_id: cartItemId })
                })
                .then(r => r.json())
                .then(handleCartResponse)
                .catch(err => console.error('Decrement failed', err));
                return;
            }

            // Remove (x) handler
            const remBtn = e.target.closest && e.target.closest('.remove');
            if (remBtn) {
                e.preventDefault();
                const cartItemId = remBtn.dataset.cartItemId;
                if (!cartItemId) return;
                fetch("{{ route('cart.item.remove') }}", {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ cart_item_id: cartItemId })
                })
                .then(r => r.json())
                .then(handleCartResponse)
                .catch(err => console.error('Remove failed', err));
                return;
            }
        });

        function handleCartResponse(data) {
            if (!data) return;
            // If server returned full preview HTML, parse and replace body & foot
            if (data.html) {
                const tmp = document.createElement('div');
                tmp.innerHTML = data.html;

                const newBody = tmp.querySelector('#cartPreviewModal .body');
                const newFoot  = tmp.querySelector('#cartPreviewModal .foot');

                const root = document.getElementById('cartPreviewModal');
                if (root) {
                    const oldBody = root.querySelector('.body');
                    const oldFoot = root.querySelector('.foot');
                    if (oldBody && newBody) oldBody.innerHTML = newBody.innerHTML;
                    if (oldFoot && newFoot) oldFoot.innerHTML = newFoot.innerHTML;

                    // re-init offcanvas instance safely
                    try {
                        if (window.bootstrap && bootstrap.Offcanvas) {
                            const bs = bootstrap.Offcanvas.getOrCreateInstance(root);
                            // ensure close buttons call hide()
                            root.querySelectorAll('[data-bs-dismiss="offcanvas"], .offcanvas-close, .btn-close').forEach(btn => {
                            btn.addEventListener('click', e => {
                                e.preventDefault();
                                bs.hide();
                            });
                        });
                        }
                    } catch (e) {
                        console.error('Offcanvas rebind failed', e);
                    }
                }
            }

            if (typeof data.count !== 'undefined') {
                document.querySelectorAll('.header-action-num').forEach(el => el.textContent = data.count);
            }
        }
    })();
    </script>

    <script src="{{ asset('assets/js/vendor/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/plugins.min.js') }}"></script>

    <!-- Main Js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>