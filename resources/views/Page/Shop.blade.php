@extends('Layout.Header')
@section('content')

    <!-- Shop Category pages -->
    <div class="shop-category-area pb-100px pt-70px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                    <!-- Shop Top Area Start -->
                    <div class="shop-top-bar d-flex">
                        <!-- Left Side start -->
                        <p>There Are {{ $productsCount }} Products.</p>
                        <!-- Left Side End -->
                        <!-- Right Side Start -->
                        <div class="select-shoing-wrap d-flex align-items-center">
                            <div class="shot-product">
                                <p>Sort By:</p>
                            </div>
                            <div class="shop-select">
                                <select class="shop-sort">
                                    <option data-display="Relevance">Relevance</option>
                                    <option value="1"> Name, A to Z</option>
                                    <option value="2"> Name, Z to A</option>
                                    <option value="3"> Price, low to high</option>
                                    <option value="4"> Price, high to low</option>
                                </select>

                            </div>
                        </div>
                        <!-- Right Side End -->
                    </div>
                    <!-- Shop Top Area End -->

                    <!-- Shop Bottom Area Start -->
                    <div class="shop-bottom-area">
                        <div class="row">
                            @foreach ($products as $p)
                            <div class="col-lg-4  col-md-6 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-delay="200">
                                <!-- Single Prodect -->
                                <div class="product mb-25px">
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
                                            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                    class="icon-heart"></i></a>
                                            <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#previewProduct{{ $p->id }}"><i class="icon-size-fullscreen"></i></a>
                                            <a href="compare.html" class="action compare" title="Compare"><i
                                                    class="icon-refresh"></i></a>
                                        </div>
                                        @include('Component.Product-Preview-Modal', ['product' => $p])
                                        <button title="Add To Cart" class=" add-to-cart">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title"><a href="{{ route('product.detail',$p->id) }}">{{ $p->name }}</a></h5>
                                        <span class="price">
                                            <span class="new">${{ $p->price }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--  Pagination Area Start -->
                        <div class="pro-pagination-style text-center mb-md-30px mb-lm-30px mt-30px" data-aos="fade-up">
                            @if ($products->hasPages())
                                <ul>
                                    {{-- Previous Page Link --}}
                                    @if ($products->onFirstPage())
                                        <li><span class="prev disabled"><i class="ion-ios-arrow-left"></i></span></li>
                                    @else
                                        <li><a class="prev" href="{{ $products->previousPageUrl() }}"><i class="ion-ios-arrow-left"></i></a></li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                        @if ($page == $products->currentPage())
                                            <li><a class="active" href="#">{{ $page }}</a></li>
                                        @else
                                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($products->hasMorePages())
                                        <li><a class="next" href="{{ $products->nextPageUrl() }}"><i class="ion-ios-arrow-right"></i></a></li>
                                    @else
                                        <li><span class="next disabled"><i class="ion-ios-arrow-right"></i></span></li>
                                    @endif
                                </ul>
                            @endif
                        </div>
                        <!--  Pagination Area End -->
                    </div>
                    <!-- Shop Bottom Area End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-md-60px mb-lm-60px">
                    <div class="shop-sidebar-wrap">
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget">
                            <div class="main-heading">
                                <h3 class="sidebar-title">Category</h3>
                            </div>
                            <div class="sidebar-widget-category">
                                <ul>
                                    <li><a href="{{ route('shop', 'all') }}" class="{{ $category == 'all' ? 'selected' : '' }}">All <span>({{ $all }})</span> </a></li>
                                    @foreach ($categories as $c)
                                        <li><a href="{{ route('shop', $c->name) }}" class="{{ $category == $c->name ? 'selected' : '' }}">{{ $c->name }} <span>({{ $c->products->count() }})</span> </a></li>                                 
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget-group">
                            <h3 class="sidebar-title">Filter By</h3>
                            <div class="sidebar-widget">
                                <h4 class="pro-sidebar-title">Price</h4>
                                <div class="price-filter">
                                    <div class="price-slider-amount">
                                        <input type="text" id="amount" class="p-0 h-auto lh-1" name="price" placeholder="Add Your Price" />
                                    </div>
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                            <!-- Sidebar single item -->
                            <div class="sidebar-widget">
                                <h4 class="pro-sidebar-title mt-5">Size</h4>
                                <div class="sidebar-widget-list">
                                    <ul>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" /> <a href="#">Large <span>(4)</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value="" /> <a href="#">Medium
                                                    <span>(4)</span></a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value="" /> <a href="#">Small <span>(4)</span>
                                                </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value="" /> <a href="#">Extra
                                                    Large<span>(4)</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar single item -->
                            <div class="sidebar-widget no-cba">
                                <h4 class="pro-sidebar-title">Colour</h4>
                                <div class="sidebar-widget-list">
                                    <ul>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" /> <a href="#">Grey<span>(2)</span> </a>
                                                <span class="checkmark grey"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value="" /> <a href="#">White<span>(4)</span></a>
                                                <span class="checkmark white"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value="" /> <a href="#">Black<span>(4)</span>
                                                </a>
                                                <span class="checkmark black"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value="" /> <a href="#">Camel<span>(4)</span>
                                                </a>
                                                <span class="checkmark camel"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar single item -->
                            <div class="sidebar-widget">
                                <h4 class="pro-sidebar-title">Brand</h4>
                                <div class="sidebar-widget-list">
                                    <ul>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" /> <a href="#">Studio Design<span>(10)</span>
                                                </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value="" /> <a href="#">Graphic
                                                    Corner<span>(7)</span></a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget tag">
                            <div class="main-heading">
                                <h3 class="sidebar-title mt-3">Tags</h3>
                            </div>
                            <div class="sidebar-widget-tag">
                                <ul>
                                    <li><a href="#">All</a></li>
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">Chair</a></li>
                                    <li><a href="#">Decoration</a></li>
                                    <li><a href="#">Furniture</a></li>
                                    <li><a href="#">Sofa</a></li>
                                    <li><a href="#">Table</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection