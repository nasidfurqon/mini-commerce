@extends('Layout.Header')
@section('content')


      <!-- checkout-area start -->
      
<section class="checkout-area section-space">
   <div class="container">
      <form action="{{ route('user.checkout.place') }}" method="POST">
         @csrf
         <div class="row">
            <div class="col-lg-6">
               <div class="checkbox-form">
                  <h3 class="mb-15">Billing Details</h3>
                  <div class="row g-5">
                     <div class="col-md-12">
                        <div class="checkout-form-list">
                           <label>Address <span class="required">*</span></label>
                           <textarea name="address" placeholder="Street address" required>{{ old('address') }}</textarea>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-lg-6">
               <div class="your-order-checkout-modern">
                  <div class="order-header">
                     <h3 class="order-title">Ringkasan Pesanan</h3>
                     <div class="order-badge">
                        <span class="item-count">{{ $items->sum('qty') }} Items</span>
                     </div>
                  </div>

                  <div class="order-items-container">
                     @foreach($items as $item)
                        <div class="order-item">
                           <div class="item-info">
                              <div class="item-image">
                                 <img src="{{ asset($item->image ?? '') }}" alt="" width="40" height="40"/>
                              </div>
                              <div class="item-details">
                                 <h4 class="item-name">{{ $item->name }}</h4>
                                 <div class="item-meta">
                                    <span class="item-quantity">Qty: {{ $item->qty }}</span>
                                 </div>
                              </div>
                           </div>
                           <div class="item-price">
                              <span class="price-amount">Rp{{ number_format($item->price * $item->qty, 2, ',', '.') }}</span>
                           </div>
                        </div>
                     @endforeach
                  </div>

                  <div class="order-summary-modern">
                     <div class="summary-row">
                        <span class="summary-label">Sub-Total</span>
                        <span class="summary-value">Rp{{ number_format($subTotal, 2, ',', '.') }}</span>
                     </div>
                     <div class="summary-row">
                        <span class="summary-label">Eco Tax (2%)</span>
                        <span class="summary-value">Rp{{ number_format(max(0, $subTotal * 0.02), 2, ',', '.') }}</span>
                     </div>
                     <div class="summary-row">
                        <span class="summary-label">VAT (20%)</span>
                        <span class="summary-value">Rp{{ number_format($subTotal * 0.20, 2, ',', '.') }}</span>
                     </div>
                     <div class="summary-row total-row">
                        <span class="summary-label total-label">Total Pembayaran</span>
                        <span class="summary-value total-value">Rp{{ number_format($subTotal + max(0, $subTotal * 0.02) + ($subTotal * 0.20), 2, ',', '.') }}</span>
                     </div>
                  </div>

                  <div class="checkout-action-buttons">
                     <a href="{{ route('user.cart.index') }}" class="checkout-btn checkout-btn-ghost" aria-label="Kembali ke Keranjang">
                        <span class="btn-label">Kembali ke Keranjang</span>
                     </a>
                     <button type="submit" class="checkout-btn checkout-btn-primary" aria-label="Checkout">
                        <span class="btn-label">Checkout</span>
                     </button>
                  </div>

               </div>
            </div>
         </div>
      </form>
   </div>
</section>
      <!-- checkout-area end -->

@endsection
