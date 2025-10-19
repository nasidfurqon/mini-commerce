@extends('Layout.Header')

@section('content')


    <!-- Product Details Area Start -->
    <div class="product-details-area pt-100px pb-100px bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                    <!-- Swiper -->
                    <div class="swiper-container gallery-top mb-20px">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="img-responsive m-auto" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-details-content quickview-content">
                        <h2>{{ $product->name }}</h2>
                        
                        <!-- Product Category and Stock Info -->
                        <div class="product-meta-info mb-3">
                            <div class="product-category mb-2">
                                <span class="meta-label" style="font-weight: 600; color: #666; font-size: 14px;">
                                    <i class="fas fa-tag" style="margin-right: 6px;"></i>Category:
                                </span>
                                <span class="meta-value" style="color: #333; font-size: 14px; margin-left: 8px;">{{ $product->category->name }}</span>
                            </div>
                            <div class="product-stock">
                                <span class="meta-label" style="font-weight: 600; color: #666; font-size: 14px;">
                                    <i class="fas fa-boxes" style="margin-right: 6px;"></i>Stock:
                                </span>
                                <span class="meta-value stock-count" style="font-weight: 600; font-size: 14px; margin-left: 8px;">{{ $product->stock }} units</span>
                            </div>
                        </div>                                             
                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price not-cut">Rp {{ number_format($product->price, 2, ',', '.') }}</li>
                            </ul>
                        </div>
                            <div class="mt-3">
                                <p class="mb-1"><span class="text-muted">Weight:</span> <span class="fw-semibold">{{ $product->weight }} g</span></p>
                                <p class="mb-1"><span class="text-muted">Dimensions:</span> <span class="fw-semibold">{{ $product->dimension }}</span></p>
                                <p class="mb-1"><span class="text-muted">Materials:</span> <span class="fw-semibold">{{ $product->material }}</span></p>
                            </div>
                        <p class="quickview-para">{{ $product->description }}</p>
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                            </div>
                            <div class="pro-details-cart">
                                <!-- <button class="add-cart btn btn-primary btn-hover-primary ml-4" href="#">  Add To
                                    Cart</button> -->
                               @include('Component.Product-Preview-Modal', ['product' => $product])
                               @auth
                                    <button type="button"
                                            class="add-to-cart ajax-add-to-cart "
                                            data-product-id="{{ $product->id }}"
                                            data-qty="1"
                                            title="Add To Cart">
                                        Add To Cart
                                    </button>
                                @else
                                    <a title="Add To Cart" href="{{ route('auth.page') }}" class="add-to-cart">Add To Cart</a>
                                @endauth
                            </div>
                        </div>              
                        <div class="pro-details-policy">
                            <ul>
                                <li><i class="fas fa-shield-alt" style="margin-right: 8px;"></i><span>Security Policy (Edit With
                                        Customer Reassurance Module)</span></li>
                                <li><i class="fas fa-truck" style="margin-right: 8px;"></i><span>Delivery Policy (Edit
                                        With Customer Reassurance Module)</span></li>
                                <li><i class="fas fa-undo-alt" style="margin-right: 8px;"></i><span>Return Policy (Edit With
                                        Customer Reassurance Module)</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Product Start -->
    <div class="section pb-100px" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <!-- section title start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-start mb-11">
                        <h2 class="title">You Might Also Like</h2>
                    </div>
                </div>
            </div>
            <!-- section title start -->
            <div class="new-product-slider swiper-container slider-nav-style-1" data-aos="fade-up" data-aos-delay="200">
                <div class="new-product-wrapper swiper-wrapper">
                    <!-- Single Prodect -->
                    @foreach ($products as $p)
                    <div class="new-product-item swiper-slide">
                        <div class="product">
                            <div class="thumb">
                                <a href="{{ route('product.detail',$p->id) }}" class="image">
                                    <img src="{{ asset($p->image) }}" alt="Product" />
                                    <img class="hover-image" src="{{ asset($p->image) }}" alt="Product" />
                                </a>
                                <span class="badges">
                                @if($p->created_at->diffInDays(now()) <= 2)
                                    <span class="new">New</span>
                                @endif                                    
                                </span>
                                <div class="actions">                                   
                                    <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#previewProduct{{ $product->id }}"><i
                                            class="icon-size-fullscreen"></i></a>                          
                                </div>
                                @include('Component.Product-Preview-Modal', ['product' => $p])
                               @auth
                                    <button type="button"
                                            class="add-to-cart ajax-add-to-cart "
                                            data-product-id="{{ $p->id }}"
                                            data-qty="1"
                                            title="Add To Cart">
                                        Add To Cart
                                    </button>
                                @else
                                    <a title="Add To Cart" href="{{ route('auth.page') }}" class="add-to-cart">Add To Cart</a>
                                @endauth
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="{{ route('product.detail',$p->id) }}">{{ $p->name }}</a></h5>
                                <span class="price">
                                    <span class="new">Rp {{ number_format($p->price, 2, ',', '.') }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- Add Arrows -->
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Product End -->

    <!-- New Product Start -->
    <div class="section pb-100px" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <!-- section title start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-start mb-11">
                        <h2 class="title">12 Other Products In The Same Category:</h2>
                    </div>
                </div>
            </div>
            <!-- section title start -->
            <div class="new-product-slider swiper-container slider-nav-style-1" data-aos="fade-up" data-aos-delay="200">
                <div class="new-product-wrapper swiper-wrapper">
                    <!-- Single Prodect -->
                    @foreach ($relatedProducts as $p)
                    <div class="new-product-item swiper-slide">
                        <div class="product">
                            <div class="thumb">
                                <a href="{{ route('product.detail',$p->id) }}" class="image">
                                    <img src="{{ asset($p->image) }}" alt="Product" />
                                    <img class="hover-image" src="{{ asset($p->image) }}" alt="Product" />
                                </a>
                                <span class="badges">
                                {{--<span class="sale">-10%</span>--}}
                                @if($p->created_at->diffInDays(now()) <= 2)
                                    <span class="new">New</span>
                                @endif
                                </span>
                                <div class="actions">                                   
                                    <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#previewProduct{{ $p->id }}"><i
                                            class="icon-size-fullscreen"></i></a>                                   
                                </div>
                                @include('Component.Product-Preview-Modal', ['product' => $p])
                               @auth
                                    <button type="button"
                                            class="add-to-cart ajax-add-to-cart "
                                            data-product-id="{{ $p->id }}"
                                            data-qty="1"
                                            data-stock="{{ $p->stock }}"
                                            title="Add To Cart">
                                        Add To Cart
                                    </button>
                                @else
                                    <a title="Add To Cart" href="{{ route('auth.page') }}" class="add-to-cart">Add To Cart</a>
                                @endauth
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="{{ route('product.detail',$p->id) }}">{{ $p->name }}</a></h5>
                                <span class="price">
                                    <span class="new">Rp {{ number_format($p->price, 2, ',', '.') }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>


@endsection