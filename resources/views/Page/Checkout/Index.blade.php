@extends('Layout.Header')
@section('content')


      <!-- checkout-area start -->
      <section class="checkout-area section-space">
         <div class="container">
            <form action="###">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="checkbox-form">
                        <h3 class="mb-15">Billing Details</h3>
                        
                        <div class="row g-5">                         
                           <div class="col-md-12">
                              <div class="checkout-form-list">
                                 <label>Address <span class="required">*</span></label>
                                 <textarea type="text" placeholder="Street address"></textarea>
                              </div>
                           </div>              
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="your-order-checkout-modern">
                        <!-- Header Section -->
                        <div class="order-header">         
                           <h3 class="order-title">Ringkasan Pesanan</h3>
                           <div class="order-badge">
                              <span class="item-count">3 Items</span>
                           </div>
                        </div>

                        <!-- Order Items Section -->
                        <div class="order-items-container">
                           <div class="order-item">
                              <div class="item-info">
                                 <div class="item-image">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <rect width="40" height="40" rx="8" fill="#ff7004" opacity="0.1"/>
                                       <path d="M12 16H28L26 28H14L12 16Z" stroke="#ff7004" stroke-width="2" fill="none"/>
                                       <path d="M12 16L10 12H8" stroke="#ff7004" stroke-width="2" stroke-linecap="round"/>
                                       <circle cx="18" cy="32" r="2" fill="#ff7004"/>
                                       <circle cx="26" cy="32" r="2" fill="#ff7004"/>
                                    </svg>
                                 </div>
                                 <div class="item-details">
                                    <h4 class="item-name">Alexander Sofa</h4>
                                    <div class="item-meta">
                                       <span class="item-quantity">Qty: 1</span>
                                       <span class="item-separator">•</span>
                                       <span class="item-category">Furniture</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="item-price">
                                 <span class="price-amount">$24.00</span>
                              </div>
                           </div>

                           <div class="order-item">
                              <div class="item-info">
                                 <div class="item-image">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <rect width="40" height="40" rx="8" fill="#ff7004" opacity="0.1"/>
                                       <circle cx="20" cy="20" r="8" stroke="#ff7004" stroke-width="2" fill="none"/>
                                       <path d="M16 20L18 22L24 16" stroke="#ff7004" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                 </div>
                                 <div class="item-details">
                                    <h4 class="item-name">Curaskin Lipgel</h4>
                                    <div class="item-meta">
                                       <span class="item-quantity">Qty: 1</span>
                                       <span class="item-separator">•</span>
                                       <span class="item-category">Beauty</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="item-price">
                                 <span class="price-amount">$12.00</span>
                              </div>
                           </div>

                           <div class="order-item">
                              <div class="item-info">
                                 <div class="item-image">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <rect width="40" height="40" rx="8" fill="#ff7004" opacity="0.1"/>
                                       <path d="M10 30H30V18H10V30Z" stroke="#ff7004" stroke-width="2" fill="none"/>
                                       <path d="M14 18V14C14 11.79 15.79 10 18 10H22C24.21 10 26 11.79 26 14V18" stroke="#ff7004" stroke-width="2" fill="none"/>
                                    </svg>
                                 </div>
                                 <div class="item-details">
                                    <h4 class="item-name">Leather Chair</h4>
                                    <div class="item-meta">
                                       <span class="item-quantity">Qty: 1</span>
                                       <span class="item-separator">•</span>
                                       <span class="item-category">Furniture</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="item-price">
                                 <span class="price-amount">$22.00</span>
                              </div>
                           </div>
                        </div>
                        <!-- Order Summary Section -->
                        <div class="order-summary-modern">                              
                           <div class="summary-row total-row">
                              <span class="summary-label total-label">Total Pembayaran</span>
                              <span class="summary-value total-value">$65.00</span>
                           </div>                           
                        </div>
                        <!-- Checkout Action Buttons -->
                        <div class="checkout-action-buttons">
                           <a href="{{ route('user.cart.index') }}" class="checkout-btn checkout-btn-ghost" aria-label="Kembali ke Keranjang">
                              <span class="btn-label">Kembali ke Keranjang</span>
                           </a>
                           <button type="submit" href="{{ route('user.checkout.index') }}" class="checkout-btn checkout-btn-primary" aria-label="Checkout" data-swal-checkout="true">
                              <span class="btn-label">Checkout</span>
                           </button>
                           @include('Component.Swal-Checkout')
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </section>
      <!-- checkout-area end -->

@endsection
