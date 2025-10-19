<div class="modal fade" id="previewProduct{{ $product->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12 mb-lm-30px mb-sm-30px">
                            
                            <div class="swiper-container gallery-top mb-20px">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="{{ asset('storage/' . ltrim($product->image, '/')) }}" alt="">
                                    </div>
                                </div>
                            </div>                         
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="product-details-content quickview-content">
                                <h2>{{ $product->name }}</h2>
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
                                        <li class="old-price not-cut">${{ number_format($product->price / 100, 2) }}</li>
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
                                    <div class="pro-details-cart btn-hover">
                                        @auth
                                        <button type="button"
                                                class="add-cart ajax-add-to-cart btn btn-primary btn-hover-primary ml-4"
                                                data-product-id="{{ $product->id }}"
                                                data-qty="1"
                                                data-stock="{{ $product->stock }}"
                                                title="Add To Cart">
                                            Add To Cart
                                            </button>
                                        @else
                                            <a title="Add To Cart" href="{{ route('auth.page') }}" class="add-to-cart">Add To Cart</a>
                                        @endauth
                                        
                                    </div>
                                </div>
                    

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>

#previewProduct{{ $product->id }} .modal-header { border-bottom: 0; padding: .75rem .75rem 0 .75rem; }
#previewProduct{{ $product->id }} .btn-close { opacity: .7; width: 1.125rem; height: 1.125rem; }
#previewProduct{{ $product->id }} .btn-close:hover { opacity: 1; }
</style>