@extends('Layout.Header')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/cart-modern.css') }}">
<style>

.cart-list .cart-item { display:grid; grid-template-columns: 100px 1fr auto; gap:16px; align-items:center; padding:12px 0; border-bottom:1px solid #eee; }
.cart-list .product-thumbnail { border: none; }
.cart-list .product-thumbnail img { width:100%; max-width:90px; height:90px; object-fit:cover; border-radius:8px; border:none; outline:none; }
.cart-list .item-content .product-name { display:block; font-weight:600; margin-bottom:4px; }
.cart-list .item-content .product-price-cart .amount { font-weight:600; }
.cart-list .item-actions { display:grid; grid-auto-flow:column; gap:12px; align-items:center; justify-content:end; padding-right:12px; }
.cart-list .item-actions .product-quantity { min-width:150px; }
.cart-list .product-subtotal { min-width:140px; text-align:right; white-space:nowrap; }
.cart-list .product-remove { min-width:40px; text-align:right; }


.cart-list .cart-plus-minus { background: transparent !important; border: 1px solid #e9ecef; border-radius: 8px; padding: 4px 6px; height:auto; display:inline-flex; align-items:center; gap:4px; }
.cart-list .cart-plus-minus .btn.btn-sm { width: 28px; height: 28px; padding: 0; line-height: 28px; display: inline-flex; align-items: center; justify-content: center; }
.cart-list .cart-plus-minus .btn.btn-sm.btn-outline-secondary { border-color:#e9ecef; color:#6c757d; }
.cart-list .cart-plus-minus .btn.btn-sm.btn-outline-secondary:hover { background:#f3f4f6; }
.cart-list .qty-box { width: 36px !important; height: 28px; padding: 0; margin: 0 2px; text-align:center; border: none; background: transparent; }


.cart-list .product-remove .remove-link { width:28px; height:28px; border:1px solid #f1aeb5; border-radius:50%; color:#dc3545; display:inline-flex; align-items:center; justify-content:center; text-decoration:none; background:transparent; }
.cart-list .product-remove .remove-link:hover { background:#f8d7da; }
.cart-list .product-remove .remove-link .icon { font-size:14px; line-height:1; }

@media (max-width: 576px) {
  .cart-list .cart-item { grid-template-columns: 80px 1fr; }
  .cart-list .item-actions { grid-column: 1 / -1; justify-content:flex-start; gap:8px; }
  .cart-list .product-subtotal, .cart-list .product-remove { text-align:left; }
}
</style>


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
                                        <img class="img-responsive" src="{{ $item->image_url }}" alt="" />
                                    </a>
                                </div>
                                <div class="item-content">
                                    <a href="{{ route('product.detail', $item->id) }}" class="product-name">{{ $item->name }}</a>
                                    <div class="product-price-cart"><span class="amount">Rp {{ number_format($item->price, 2, ',', '.') }}</span></div>
                                </div>
                                <div class="item-actions">
                                    <div class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <button type="button" class="btn btn-sm btn-outline-secondary decrement-btn" data-cart-item-id="{{ $item->cart_item_id }}">−</button>
                                            <input class="cart-plus-minus-box qty-box" type="text" name="qtybutton" value="{{ $item->qty }}" data-cart-item-id="{{ $item->cart_item_id }}" />
                                            <button type="button" class="btn btn-sm btn-outline-secondary increment-btn" data-product-id="{{ $item->id }}">+</button>
                                        </div>
                                    </div>
                                    <div class="product-subtotal" data-subtotal-for="{{ $item->cart_item_id }}">Rp{{ number_format($item->price * $item->qty, 2, ',', '.') }}</div>
                                    <div class="product-remove">
                                        <button type="button" class="remove-link" aria-label="Remove item" data-cart-item-id="{{ $item->cart_item_id }}">
                                            <span class="icon" aria-hidden="true">&times;</span>
                                        </button>
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
                    <h5>Total products <span id="cart-index-total">Rp{{ number_format($subTotal,2, ',', '.') }}</span></h5>
                    <a href="{{ route('user.checkout.index') }}">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

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

        
        const ct = res.headers.get('content-type') || '';
        if (!res.ok) {
            let json = null;
            if (ct.includes('application/json')) {
                try { json = await res.json(); } catch(e){  }
            }
            return { ok: false, status: res.status, json };
        }

        if (!ct.includes('application/json')) {
            
            return { ok: false, status: res.status, json: { error: 'Unexpected non-json response' } };
        }

        const json = await res.json();
        return { ok: true, status: res.status, json };
    }
    function applyCartResponse(data) {
        if (!data) return;

        if (data.updated_item) {
            const { cart_item_id, qty, price } = data.updated_item;

            
            const row = document.querySelector(`.cart-item[data-cart-item-id="${cart_item_id}"]`);
            if (row) {
                const qtyBox = row.querySelector('.qty-box');
                if (qtyBox) qtyBox.value = qty;
                const sub = row.querySelector(`[data-subtotal-for="${cart_item_id}"]`);
                if (sub) sub.textContent = `Rp${(price * qty).toFixed(2)       
                .replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;
            }

            
            const mini = document.querySelector(`#cartPreviewModal [data-cart-item-id="${cart_item_id}"] .quantity-price`);
            if (mini) mini.innerHTML = `${qty} x <span class="amount">Rp${price.toFixed(2)}</span>`;
        }

        if (data.removed_item_id) {
            document.querySelectorAll(`[data-cart-item-id="${data.removed_item_id}"]`).forEach(el => el.remove());
        }

        if (typeof data.subtotal !== 'undefined') {
            const totalEl = document.getElementById('cart-index-total');
            if (totalEl) totalEl.textContent = `Rp${parseFloat(data.subtotal).toFixed(2)       
                .replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;

            
            const subEl = document.getElementById('cart-preview-subtotal');
            const totalOffEl = document.getElementById('cart-preview-total');
            if (subEl && totalOffEl) {
                const sub = parseFloat(data.subtotal);
                subEl.textContent = `Rp${sub.toFixed(2)}`;
                totalOffEl.textContent = `Rp${(sub + sub * 0.22).toFixed(2)}`;
            }
        }

        if (typeof data.count !== 'undefined') {
            document.querySelectorAll('.header-action-num').forEach(el => el.textContent = data.count);
        }

        if (data.html) {
            const tmp = document.createElement('div');
            tmp.innerHTML = data.html;
            const preview = document.getElementById('cartPreviewModal');
            const newBody = tmp.querySelector('#cartPreviewModal .body');
            if (preview && newBody) {
                const oldBody = preview.querySelector('.body');
                if (oldBody) oldBody.innerHTML = newBody.innerHTML;
            }
        }
    }

    
    document.addEventListener('click', async function(e){
        
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

        
        const rem = e.target.closest && e.target.closest('.remove-link');
        if (rem) {
            e.preventDefault(); e.stopImmediatePropagation();
            const id = rem.dataset.cartItemId;
            if (!id) return;
            const res = await fetchJson("{{ route('cart.item.onRemove') }}", { cart_item_id: id });
            if (!res.ok) {
                if (res.status === 401 || res.status === 419) { alert('Session expired. Login again.'); return; }
                console.error(res.json); return;
            }
            applyCartResponse(res.json);
            return;
        }

        
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

    
    document.addEventListener('change', async function(e){
        const input = e.target.closest && e.target.closest('.qty-box');
        if (!input) return;
        e.preventDefault(); e.stopImmediatePropagation();

        const newQty = Math.max(1, parseInt(input.value) || 1);
        const cartItemId = input.dataset.cartItemId;
        if (!cartItemId) return;

        
        const productId = input.closest('.cart-item')?.getAttribute('data-product-id');
        if (!productId) return;

        
        let res = await fetchJson("{{ route('cart.item.onRemove') }}", { cart_item_id: cartItemId });
        if (!res.ok && res.status !== 404) {
            if (res.status === 401 || res.status === 419) { alert('Session expired. Login again.'); return; }
            console.error(res.json); 
        }

        
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