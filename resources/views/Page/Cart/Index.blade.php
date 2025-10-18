@extends('Layout.Header')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/cart-modern.css') }}">

@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;

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

<!-- Cart Area Start -->
<div class="cart-main-area pt-100px pb-100px">
    <div class="container">
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row g-4">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="cart-list" id="cart-index-list">
                    @if($items->isEmpty())
                        <p class="p-3">No items in cart.</p>
                    @else
                        @foreach($items as $item)
                            <div class="cart-item" data-cart-item-id="{{ $item->cart_item_id }}" data-product-id="{{ $item->id }}">
                                <div class="product-thumbnail">
                                    <a href="{{ route('product.detail', $item->id) }}">
                                        <img class="img-responsive" src="{{ asset($item->image) }}" alt="" />
                                    </a>
                                </div>
                                <div class="item-content">
                                    <a href="{{ route('product.detail', $item->id) }}" class="product-name">{{ $item->name }}</a>
                                    <div class="product-price-cart"><span class="amount">${{ number_format($item->price,2) }}</span></div>
                                </div>
                                <div class="item-actions">
                                    <div class="product-quantity">
                                        <div class="cart-plus-minus" style="display:flex;gap:8px;align-items:center;">
                                            <button type="button" class="btn btn-sm btn-outline-secondary decrement-btn" data-cart-item-id="{{ $item->cart_item_id }}">−</button>
                                            <input class="cart-plus-minus-box qty-box" type="text" name="qtybutton" value="{{ $item->qty }}" data-cart-item-id="{{ $item->cart_item_id }}" style="width:48px;text-align:center"/>
                                            <button type="button" class="btn btn-sm btn-outline-secondary increment-btn" data-product-id="{{ $item->id }}">+</button>
                                        </div>
                                    </div>
                                    <div class="product-subtotal" data-subtotal-for="{{ $item->cart_item_id }}">${{ number_format($item->price * $item->qty,2) }}</div>
                                    <div class="product-remove">
                                        <button type="button" class="remove-link btn btn-link text-danger" aria-label="Remove item" data-cart-item-id="{{ $item->cart_item_id }}"><i class="icon-close">×</i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-lg-4 col-md-12 mt-md-30px">
                <div class="grand-totall" id="cart-index-summary">
                    <div class="title-wrap">
                        <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                    </div>
                    <h5>Total products <span id="cart-index-total">${{ number_format($subTotal,2) }}</span></h5>
                    <a href="{{ route('user.checkout.index') }}">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Area End -->
<script>
(async function(){
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    async function fetchJson(url, body) {
        const res = await fetch(url, {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify(body)
        });

        // jika server redirect ke login (HTML) atau tidak JSON, tangani tanpa menavigasi
        const ct = res.headers.get('content-type') || '';
        if (!res.ok) {
            let json = null;
            if (ct.includes('application/json')) {
                try { json = await res.json(); } catch(e){ /* ignore */ }
            }
            return { ok: false, status: res.status, json };
        }

        if (!ct.includes('application/json')) {
            // kemungkinan redirect HTML (session expired) — jangan redirect otomatis
            return { ok: false, status: res.status, json: { error: 'Unexpected non-json response' } };
        }

        const json = await res.json();
        return { ok: true, status: res.status, json };
    }
    function applyCartResponse(data) {
        if (!data) return;

        if (data.updated_item) {
            const { cart_item_id, qty, price } = data.updated_item;

            // update pada halaman cart utama
            const row = document.querySelector(`.cart-item[data-cart-item-id="${cart_item_id}"]`);
            if (row) {
                const qtyBox = row.querySelector('.qty-box');
                if (qtyBox) qtyBox.value = qty;
                const sub = row.querySelector(`[data-subtotal-for="${cart_item_id}"]`);
                if (sub) sub.textContent = `$${(price * qty).toFixed(2)}`;
            }

            // update di offcanvas modal (kalau ada)
            const mini = document.querySelector(`#cartPreviewModal [data-cart-item-id="${cart_item_id}"] .quantity-price`);
            if (mini) mini.innerHTML = `${qty} x <span class="amount">$${price.toFixed(2)}</span>`;
        }

        if (data.removed_item_id) {
            document.querySelectorAll(`[data-cart-item-id="${data.removed_item_id}"]`).forEach(el => el.remove());
        }

        if (typeof data.subtotal !== 'undefined') {
            const totalEl = document.getElementById('cart-index-total');
            if (totalEl) totalEl.textContent = `$${parseFloat(data.subtotal).toFixed(2)}`;

            // update di offcanvas subtotal & total kalau ada
            const subEl = document.getElementById('cart-preview-subtotal');
            const totalOffEl = document.getElementById('cart-preview-total');
            if (subEl && totalOffEl) {
                const sub = parseFloat(data.subtotal);
                subEl.textContent = `$${sub.toFixed(2)}`;
                totalOffEl.textContent = `$${(sub + sub * 0.22).toFixed(2)}`;
            }
        }

        if (typeof data.count !== 'undefined') {
            document.querySelectorAll('.header-action-num').forEach(el => el.textContent = data.count);
        }

        if (data.html) {
            const tmp = document.createElement('div');
            tmp.innerHTML = data.html;
            const preview = document.getElementById('cartPreviewModal');
            const newList = tmp.querySelector('#cartPreviewModal .minicart-product-list');
            const newSub  = tmp.querySelector('#cartPreviewModal .sub-total');
            if (preview && newList && newSub) {
                const oldList = preview.querySelector('.minicart-product-list');
                if (oldList) oldList.replaceWith(newList);
                const oldSub = preview.querySelector('.sub-total');
                if (oldSub) oldSub.replaceWith(newSub);
            }
        }
    }

    // Delegated click handler for +, -, × on index page
    document.addEventListener('click', async function(e){
        // decrement
        const dec = e.target.closest && e.target.closest('.decrement-btn');
        if (dec) {
            e.preventDefault(); e.stopImmediatePropagation();
            const id = dec.dataset.cartItemId;
            if (!id) return;
            const res = await fetchJson("{{ route('cart.item.onDecrement') }}", { cart_item_id: id });
            if (!res.ok) {
                if (res.status === 401 || res.status === 419) { alert('Session expired. Login again.'); return; }
                console.error(res.json); return;
            }
            applyCartResponse(res.json);
            return;
        }

        // remove
        const rem = e.target.closest && e.target.closest('.remove-link');
        if (rem) {
            e.preventDefault(); e.stopImmediatePropagation();
            const id = rem.dataset.cartItemId;
            if (!id) return;
            if (!confirm('Remove this item from cart?')) return;
            const res = await fetchJson("{{ route('cart.item.onRemove') }}", { cart_item_id: id });
            if (!res.ok) {
                if (res.status === 401 || res.status === 419) { alert('Session expired. Login again.'); return; }
                console.error(res.json); return;
            }
            applyCartResponse(res.json);
            return;
        }

        // increment (+) — uses add route with qty=1
        const inc = e.target.closest && e.target.closest('.increment-btn');
        if (inc) {
            e.preventDefault(); e.stopImmediatePropagation();
            const productId = inc.dataset.productId || inc.getAttribute('data-product-id');
            if (!productId) return;
            const res = await fetchJson("{{ route('user.onCart.add') }}", { product_id: productId, qty: 1 });
            if (!res.ok) {
                if (res.status === 401 || res.status === 419) { alert('Session expired. Login again.'); return; }
                console.error(res.json); return;
            }
            applyCartResponse(res.json);
            return;
        }
    });

    // handle manual qty edit (change input) — update by removing then adding with qty
    document.addEventListener('change', async function(e){
        const input = e.target.closest && e.target.closest('.qty-box');
        if (!input) return;
        e.preventDefault(); e.stopImmediatePropagation();

        const newQty = Math.max(1, parseInt(input.value) || 1);
        const cartItemId = input.dataset.cartItemId;
        if (!cartItemId) return;

        // find product id from parent .cart-item
        const productId = input.closest('.cart-item')?.getAttribute('data-product-id');
        if (!productId) return;

        // remove existing cart item
        let res = await fetchJson("{{ route('cart.item.onRemove') }}", { cart_item_id: cartItemId });
        if (!res.ok && res.status !== 404) {
            if (res.status === 401 || res.status === 419) { alert('Session expired. Login again.'); return; }
            console.error(res.json); // continue to try re-add
        }

        // add product with newQty
        res = await fetchJson("{{ route('user.onCart.add') }}", { product_id: productId, qty: newQty });
        if (!res.ok) {
            if (res.status === 401 || res.status === 419) { alert('Session expired. Login again.'); return; }
            console.error(res.json); return;
        }
        applyCartResponse(res.json);
    });
})();
</script>

@endsection