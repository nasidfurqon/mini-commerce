@extends('Layout.Header')

@section('content')
<!-- Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                        <h2 class="breadcrumb-title">Wishlist</h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <ul class="breadcrumb-list text-center text-md-end">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Wishlist Main Area -->
<div class="wishlist-area pt-80px pb-80px">
    <div class="container">
        <!-- Wishlist Content -->
        <div class="row">
            <div class="col-12">
                <!-- Wishlist Cards Grid -->
                <div class="wishlist-cards-grid">
                    <!-- Product Card 1 -->
                    <div class="wishlist-card">
                        <div class="card-image">
                            <img src="assets/images/product-image/1.jpg" alt="Wireless Headphones">
                            <button class="remove-btn" title="Remove from wishlist">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <div class="card-content">
                            <h4 class="product-title">
                                <a href="#">Wireless Headphones</a>
                            </h4>
                            <p class="product-description">Premium quality audio device</p>
                            <div class="price-stock">
                                <span class="price">$60.00</span>
                                <span class="stock-status in-stock">In Stock</span>
                            </div>
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="wishlist-card">
                        <div class="card-image">
                            <img src="assets/images/product-image/2.jpg" alt="Smart Watch">
                            <button class="remove-btn" title="Remove from wishlist">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <div class="card-content">
                            <h4 class="product-title">
                                <a href="#">Smart Watch</a>
                            </h4>
                            <p class="product-description">Advanced fitness tracking</p>
                            <div class="price-stock">
                                <span class="price">$150.00</span>
                                <span class="stock-status in-stock">In Stock</span>
                            </div>
                            <button class="add-to-cart-btn">Add to Cart</button>
                        </div>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="wishlist-card">
                        <div class="card-image">
                            <img src="assets/images/product-image/3.jpg" alt="Bluetooth Speaker">
                            <button class="remove-btn" title="Remove from wishlist">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <div class="card-content">
                            <h4 class="product-title">
                                <a href="#">Bluetooth Speaker</a>
                            </h4>
                            <p class="product-description">Portable wireless speaker</p>
                            <div class="price-stock">
                                <span class="price">$45.00</span>
                                <span class="stock-status out-of-stock">Out of Stock</span>
                            </div>
                            <button class="add-to-cart-btn disabled" disabled>Out of Stock</button>
                        </div>
                    </div>
                </div>

                <!-- Wishlist Actions -->
                <div class="wishlist-actions">
                    <a href="{{ route('index') }}" class="btn-continue">← Continue Shopping</a>
                    <div class="action-buttons">
                        <button class="btn-add-all">Add All to Cart</button>
                        <button class="btn-clear">Clear Wishlist</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection