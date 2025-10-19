@extends('Layout.Header')

@section('content')


    <!-- Hero/Intro Slider Start -->
    <div class="section ">
        <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
            <!-- Hero slider Active -->
            <div class="swiper-wrapper">
                <!-- Single slider item -->
                @foreach ($newProducts as $p)                    
                <div class="hero-slide-item slider-height swiper-slide d-flex">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                <div class="hero-slide-content slider-animated-1">
                                    <span class="category">New Products</span>
                                    <h2 class="title-1">{{ $p->name }} </h2>
                                    <p>{{ $p->description }}</p>
                                    <a href="#" class="btn btn-lg btn-primary btn-hover-dark mt-5">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                                <div class="hero-slide-image">
                                    <img src="{{ asset('storage/' . ltrim($p->image, '/')) }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
                        <h2 class="title mb-4">Our Products</h2>
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
                                                <img src="{{ asset('storage/' . ltrim($product->image, '/')) }}" alt="{{ $product->name }}" loading="lazy" decoding="async" style="object-fit: cover; object-position: center; width: 100%; height: 100%; display: block;" />
                                                <img class="hover-image" src="{{ asset('storage/' . ltrim($product->image, '/')) }}" alt="{{ $product->name }}" loading="lazy" decoding="async" style="object-fit: cover; object-position: center; width: 100%; height: 100%; display: block;" />
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
                                                <span class="new">Rp {{ number_format($product->price, 2, ',', '.') }}</span>
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

    <style>
      /* Kartu produk konsisten: rasio gambar 1:1, konten rapi */
      .section.product-tab-area .product {
        display: flex;
        flex-direction: column;
        height: 100%;
        border: 1px solid #eee;
        border-radius: 10px;
        background: #fff;
        transition: box-shadow .2s ease;
      }
      .section.product-tab-area .product:hover { box-shadow: 0 2px 12px rgba(16,24,40,.08); }

      .section.product-tab-area .product .thumb { position: relative; border-bottom: 1px solid #f2f2f2; }
      .section.product-tab-area .product .thumb .image {
        display: block;
        position: relative;
        width: 100%;
        aspect-ratio: 1 / 1; /* square */
        overflow: hidden;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
      }
      .section.product-tab-area .product .thumb img { width: 100%; height: 100%; object-fit: cover; display: block; }
      .section.product-tab-area .product .thumb .hover-image { position: absolute; inset: 0; opacity: 0; transition: opacity .2s ease; }
      .section.product-tab-area .product:hover .thumb .hover-image { opacity: 1; }

      .section.product-tab-area .product .actions { position: absolute; right: 10px; bottom: 10px; display: flex; gap: 8px; }
      .section.product-tab-area .product .content { padding: 12px 14px; display: flex; flex-direction: column; gap: 6px; flex: 1 1 auto; }
      .section.product-tab-area .product .content .title {
        font-size: 15px; line-height: 1.3; margin: 0;
        display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
        min-height: calc(1.3em * 2); /* pastikan tinggi judul konsisten */
      }
      .section.product-tab-area .product .price .new { font-weight: 600; color: #111; }
      .section.product-tab-area .product .add-to-cart { margin-top: auto; }

      /* Fallback jika browser belum mendukung aspect-ratio */
      @supports not (aspect-ratio: 1 / 1) {
        .section.product-tab-area .product .thumb .image::before { content: ""; display: block; padding-top: 100%; }
        .section.product-tab-area .product .thumb img,
        .section.product-tab-area .product .thumb .hover-image { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
      }
    </style>

    <script>
    (function(){
      try {
        if (!(window.CSS && CSS.supports && CSS.supports('aspect-ratio: 1 / 1'))) {
          document.querySelectorAll('.section.product-tab-area .product .thumb .image').forEach(function(el){
            function setHeight(){ el.style.height = el.clientWidth + 'px'; }
            setHeight();
            window.addEventListener('resize', setHeight);
          });
        }
      } catch (e) { /* noop */ }
    })();
    </script>

@endsection