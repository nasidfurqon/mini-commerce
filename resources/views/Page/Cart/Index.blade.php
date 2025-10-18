@extends('Layout.Header')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/cart-modern.css') }}">

    <!-- Cart Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Your cart items</h3>
            <div class="row g-4">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="cart-list">                        
                        <div class="cart-item">
                                <div class="product-thumbnail">
                                    <a href="#"><img class="img-responsive" src="{{ asset('assets/images/product-image/1.jpg') }}" alt="" /></a>
                                </div>
                                <div class="item-content">
                                    <a href="#" class="product-name">Product Name</a>
                                    <div class="product-price-cart"><span class="amount">$60.00</span></div>
                                </div>
                                <div class="item-actions">
                                    <div class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                        </div>
                                    </div>
                                    <div class="product-subtotal">$60.00</div>
                                    <div class="product-remove">
                                        <a href="#" class="remove-link" aria-label="Remove item"><i class="icon-close"></i></a>
                                    </div>
                                </div>
                        </div>
                        <div class="cart-item">
                                <div class="product-thumbnail">
                                    <a href="#"><img class="img-responsive" src="{{ asset('assets/images/product-image/2.jpg') }}" alt="" /></a>
                                </div>
                                <div class="item-content">
                                    <a href="#" class="product-name">Product Name</a>
                                    <div class="product-price-cart"><span class="amount">$50.00</span></div>
                                </div>
                                <div class="item-actions">
                                    <div class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                        </div>
                                    </div>
                                    <div class="product-subtotal">$50.00</div>
                                    <div class="product-remove">
                                        <a href="#" class="remove-link" aria-label="Remove item"><i class="icon-close"></i></a>
                                    </div>
                                </div>
                        </div>
                        <div class="cart-item">
                                <div class="product-thumbnail">
                                    <a href="#"><img class="img-responsive" src="{{ asset('assets/images/product-image/3.jpg') }}" alt="" /></a>
                                </div>
                                <div class="item-content">
                                    <a href="#" class="product-name">Product Name</a>
                                    <div class="product-price-cart"><span class="amount">$70.00</span></div>
                                </div>
                                <div class="item-actions">
                                    <div class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                        </div>
                                    </div>
                                    <div class="product-subtotal">$70.00</div>
                                    <div class="product-remove">
                                        <a href="#" class="remove-link" aria-label="Remove item"><i class="icon-close"></i></a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mt-md-30px">
                    <div class="grand-totall">
                        <div class="title-wrap">
                            <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                        </div>
                        <h5>Total products <span>$260.00</span></h5>
                        <a href="{{ route('user.checkout.index') }}">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->

<script src="{{ asset('assets/js/cart-modern.js') }}"></script>
@endsection