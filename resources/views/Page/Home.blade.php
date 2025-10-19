@extends('Layout.Header')

@section('content')


    <!-- Hero/Intro Slider Start -->
    <div class="section ">
        <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
            <!-- Hero slider Active -->
            <div class="swiper-wrapper">
                <!-- Single slider item -->
                <div class="hero-slide-item slider-height swiper-slide d-flex">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                <div class="hero-slide-content slider-animated-1">
                                    <span class="category">New Products</span>
                                    <h2 class="title-1">Jamboel Menawan </h2>
                                    <p>Lorem Ipsm dan kawan kawan</p>
                                    <a href="#" class="btn btn-lg btn-primary btn-hover-dark mt-5">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                                <div class="hero-slide-image">
                                    <img src="{{ asset('assets/images/blog-image/h4.jpeg') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single slider item -->
                <div class="hero-slide-item slider-height swiper-slide d-flex">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                <div class="hero-slide-content slider-animated-1">
                                    <span class="category">New Products</span>
                                    <h2 class="title-1">Jamboel Menawan </h2>
                                    <p>Lorem Ipsm dan kawan kawan</p>
                                    <a href="#" class="btn btn-lg btn-primary btn-hover-dark mt-5">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                                <div class="hero-slide-image">
                                    <img src="{{ asset('assets/images/blog-image/h7.jpeg') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
                <!-- Single slider item -->
                <div class="hero-slide-item slider-height swiper-slide d-flex">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                <div class="hero-slide-content slider-animated-1">
                                    <span class="category">New Products</span>
                                    <h2 class="title-1">Jamboel Menawan </h2>
                                    <p>lorem ipsum dan kawan kawan</p>
                                    <a href="#" class="btn btn-lg btn-primary btn-hover-dark mt-5">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                                <div class="hero-slide-image">
                                    <img src="{{ asset('assets/images/blog-image/h3.jpeg') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <!-- Hero/Intro Slider End -->

    <!-- Product Category Start -->
    <div class="section pt-100px pb-100px">
        <div class="container">
            <div class="category-slider swiper-container" data-aos="fade-up">
                <div class="category-wrapper swiper-wrapper">
                    <!-- Single Category -->
                    @foreach ($categories as $category)
                    <div class=" swiper-slide">
                        <a href={{ route('shop', $category->name) }} class="category-inner ">
                            <div class="category-single-item">
                                <i class="{{ $category->icon }}" style="font-size: 2.5rem; margin-bottom: 10px;"></i>
                                <span class="title">{{$category->name}}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Product Category End -->

    <!-- Product tab Area Start -->
    <div class="section product-tab-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" data-aos="fade-up">  
                    <div class="section-title mb-0">
                        <h2 class="title">Our Products</h2>
                        <p class="sub-title mb-30px">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="tab-content">
                        <!-- 1st tab start -->
                        <div class="tab-pane fade show active" id="tab-product-new-arrivals">
                            <div class="row">
                                @foreach ($products as $product)
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up" data-aos-delay="200">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <div class="thumb">
                                            <a href="{{ route('product.detail',$product->id) }}" class="image">
                                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
                                                <img class="hover-image" src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
                                            </a>
                                            <span class="badges">
                                                @if($product->created_at->diffInDays(now()) <= 2)
                                                    <span class="new">New</span>
                                                @endif                                    
                                            </span>
                                            <div class="actions">
                                                <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#previewProduct{{ $product->id }}"><i
                                                        class="icon-size-fullscreen"></i></a>                            
                                            </div>
                                            @include('Component.Product-Preview-Modal', ['product' => $product])
                                            <!-- @guest
                                                <a title="Add To Cart" href="{{ route('auth.page') }}" class="add-to-cart">Add To Cart</a>
                                            @else
                                                <button title="Add To Cart" class="add-to-cart">Add To Cart</button>
                                            @endguest -->
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
                                        <div class="content">
                                            <h5 class="title"><a href="{{ route('product.detail',$product->id) }}">{{ $product->name }} </a></h5>
                                            <span class="price">
                                                <span class="new">${{$product->price}}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product tab Area End -->

@endsection