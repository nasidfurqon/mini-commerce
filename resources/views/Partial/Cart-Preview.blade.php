@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;

    // ambil cart user jika login, jika tidak ambil cart pertama
    $cart = null;
    if (Auth::check()) {
        $cart = DB::table('carts')->where('user_id', Auth::id())->first();
    }
    if (!$cart) {
        $cart = DB::table('carts')->first();
    }

    $items = collect();
    if ($cart) {
        $items = DB::table('cart_items')
            ->where('cart_items.cart_id', $cart->id)
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->select('cart_items.id as cart_item_id','products.id','products.name','products.image','products.price','cart_items.qty')
            ->get();
    }

    $subTotal = $items->reduce(function ($carry, $item) {
        return $carry + ($item->price * $item->qty);
    }, 0);
@endphp

<!-- OffCanvas Cart Start -->
<div id="cartPreviewModal" class="offcanvas offcanvas-cart">
    <div class="inner">
        <div class="head">
            <span class="title">Cart</span>
            <button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="body customScroll">
            @if($items->isEmpty())
                <p class="p-3">No items in cart.</p>
            @else
                <ul class="minicart-product-list">
                    @foreach($items as $item)
                        <li>
                            <a href="{{ route('product.detail', $item->id) }}" class="image">
                                <img src="{{ asset($item->image) }}" alt="Cart product Image">
                            </a>
                            <div class="content">
                                <a href="{{ route('product.detail', $item->id) }}" class="title">{{ $item->name }}</a>
                                <span class="quantity-price">{{ $item->qty }} x <span class="amount">Rp{{ number_format($item->price, 2, ',', '.') }}</span></span>
                                <!-- <a href="#" class="remove">x</a> -->
                                 <button type="button"
                                                class="remove"
                                                data-cart-item-id="{{ $item->cart_item_id }}"
                                                aria-label="Remove item">
                                            ×
                                        </button>
                                <!-- <a href="#" class="decrement">-</a> -->
                                 <button type="button"
                                                class="decrement"
                                                data-cart-item-id="{{ $item->cart_item_id }}">
                                            −
                                        </button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="foot">
            <div class="sub-total">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="text-start">Sub-Total :</td>
                            <td class="text-end">Rp{{ number_format($subTotal, 2, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">Eco Tax (-2.00) :</td>
                            <td class="text-end">Rp{{ number_format(max(0, $subTotal * 0.02), 2, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">VAT (20%) :</td>
                            <td class="text-end">Rp{{ number_format($subTotal * 0.20, 2, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">Total :</td>
                            <td class="text-end theme-color">Rp{{ number_format($subTotal + ($subTotal * 0.02) + ($subTotal * 0.20), 2, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="buttons">
                <a href="{{ route('user.cart.index') }}" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                <a href="{{ route('user.checkout.index') }}" class="btn btn-outline-dark current-btn">checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- OffCanvas Cart End -->