@extends('Layout.Header')
@section('content')


      <!-- checkout-area start -->
      <section class="checkout-area section-space">
         <div class="container">
            <form action="#">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="checkbox-form">
                        <h3 class="mb-15">Billing Details</h3>
                        <div class="row g-5">
                           <div class="col-md-12">
                              <div class="country-select">
                                 <label>Country <span class="required">*</span></label>
                                 <select>
                                    <option value="volvo">United States</option>
                                    <option value="saab">Algeria</option>
                                    <option value="mercedes">Afghanistan</option>
                                    <option value="audi">Ghana</option>
                                    <option value="audi2">Albania</option>
                                    <option value="audi3">Bahrain</option>
                                    <option value="audi4">Colombia</option>
                                    <option value="audi5">Dominican Republic</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="checkout-form-list">
                                 <label>First Name <span class="required">*</span></label>
                                 <input type="text" placeholder="">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="checkout-form-list">
                                 <label>Last Name <span class="required">*</span></label>
                                 <input type="text" placeholder="">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="checkout-form-list">
                                 <label>Company Name</label>
                                 <input type="text" placeholder="">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="checkout-form-list">
                                 <label>Address <span class="required">*</span></label>
                                 <input type="text" placeholder="Street address">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="checkout-form-list">
                                 <input type="text" placeholder="Apartment, suite, unit etc. (optional)">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="checkout-form-list">
                                 <label>Town / City <span class="required">*</span></label>
                                 <input type="text" placeholder="Town / City">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="checkout-form-list">
                                 <label>State / County <span class="required">*</span></label>
                                 <input type="text" placeholder="">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="checkout-form-list">
                                 <label>Postcode / Zip <span class="required">*</span></label>
                                 <input type="text" placeholder="Postcode / Zip">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="checkout-form-list">
                                 <label>Email Address <span class="required">*</span></label>
                                 <input type="email" placeholder="">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="checkout-form-list">
                                 <label>Phone <span class="required">*</span></label>
                                 <input type="text" placeholder="Postcode / Zip">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="checkout-form-list create-acc d-flex align-content-center">
                                 <input class="e-check-input" id="xbox" type="checkbox">
                                 <label class="mb-0">Create an account?</label>
                              </div>
                              <div id="cbox_info" class="checkout-form-list create-account">
                                 <p>Create an account by entering the information below. If you are a
                                    returning
                                    customer please login at the top of the page.</p>
                                 <label>Account password <span class="required">*</span></label>
                                 <input type="password" placeholder="password">
                              </div>
                           </div>
                        </div>
                        <div class="different-address-checkout">
                           <div class="ship-different-title-checkout">
                              <label>Ship to a different address?</label>
                              <input class="e-check-input" id="ship-box" type="checkbox">
                           </div>
                           <div id="ship-box-info-checkout">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="country-select-checkout">
                                       <label>Country <span class="required">*</span></label>
                                       <select class="email s-email s-wid">
                                          <option>Bangladesh</option>
                                          <option>Algeria</option>
                                          <option>Afghanistan</option>
                                          <option>Ghana</option>
                                          <option>Albania</option>
                                          <option>Bahrain</option>
                                          <option>Colombia</option>
                                          <option>Dominican Republic</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="checkout-form-list-checkout">
                                       <label>First Name <span class="required">*</span></label>
                                       <input type="text" placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="checkout-form-list-checkout">
                                       <label>Last Name <span class="required">*</span></label>
                                       <input type="text" placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="checkout-form-list-checkout">
                                       <label>Company Name</label>
                                       <input type="text" placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="checkout-form-list-checkout">
                                       <label>Address <span class="required">*</span></label>
                                       <input type="text" placeholder="Street address">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="checkout-form-list-checkout">
                                       <input type="text" placeholder="Apartment, suite, unit etc. (optional)">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="checkout-form-list-checkout">
                                       <label>Town / City <span class="required">*</span></label>
                                       <input type="text" placeholder="Town / City">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="checkout-form-list-checkout">
                                       <label>State / County <span class="required">*</span></label>
                                       <input type="text" placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="checkout-form-list-checkout">
                                       <label>Postcode / Zip <span class="required">*</span></label>
                                       <input type="text" placeholder="Postcode / Zip">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="checkout-form-list-checkout">
                                       <label>Email Address <span class="required">*</span></label>
                                       <input type="email" placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="checkout-form-list-checkout">
                                       <label>Phone <span class="required">*</span></label>
                                       <input type="text" placeholder="Postcode / Zip">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="order-notes-checkout">
                              <div class="checkout-form-list-checkout checkout-form-list-2">
                                 <label>Order Notes</label>
                                 <textarea id="checkout-mess" cols="30" rows="10"
                                    placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="your-order-checkout-modern">
                        <!-- Header Section -->
                        <div class="order-header">
                           <div class="order-icon">
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M7 4V2C7 1.45 7.45 1 8 1H16C16.55 1 17 1.45 17 2V4H20C20.55 4 21 4.45 21 5S20.55 6 20 6H19V19C19 20.1 18.1 21 17 21H7C5.9 21 5 20.1 5 19V6H4C3.45 6 3 5.55 3 5S3.45 4 4 4H7ZM9 3V4H15V3H9ZM7 6V19H17V6H7Z" fill="currentColor"/>
                                 <path d="M9 8V17H11V8H9ZM13 8V17H15V8H13Z" fill="currentColor"/>
                              </svg>
                           </div>
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

                        <!-- Shipping Options Section -->
                        <div class="shipping-options-modern">
                           <h4 class="shipping-title">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M1 4H14L16 8V16H14.5C14.5 17.38 13.38 18.5 12 18.5S9.5 17.38 9.5 16H6.5C6.5 17.38 5.38 18.5 4 18.5S1.5 17.38 1.5 16H1V4Z" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                 <circle cx="4" cy="16" r="1.5" fill="currentColor"/>
                                 <circle cx="12" cy="16" r="1.5" fill="currentColor"/>
                              </svg>
                              Pilihan Pengiriman
                           </h4>
                           <div class="shipping-options-list">
                              <div class="shipping-option">
                                 <input type="radio" id="flat-rate" name="shipping" value="flat-rate" class="shipping-radio">
                                 <label for="flat-rate" class="shipping-label">
                                    <div class="shipping-info">
                                       <span class="shipping-name">Pengiriman Standar</span>
                                       <span class="shipping-desc">3-5 hari kerja</span>
                                    </div>
                                    <span class="shipping-price">$7.00</span>
                                 </label>
                              </div>
                              <div class="shipping-option">
                                 <input type="radio" id="free-shipping" name="shipping" value="free-shipping" class="shipping-radio">
                                 <label for="free-shipping" class="shipping-label">
                                    <div class="shipping-info">
                                       <span class="shipping-name">Pengiriman Gratis</span>
                                       <span class="shipping-desc">7-10 hari kerja</span>
                                    </div>
                                    <span class="shipping-price free">Gratis</span>
                                 </label>
                              </div>
                           </div>
                        </div>

                        <!-- Order Summary Section -->
                        <div class="order-summary-modern">
                           <div class="summary-row">
                              <span class="summary-label">Subtotal</span>
                              <span class="summary-value">$58.00</span>
                           </div>
                           <div class="summary-row">
                              <span class="summary-label">Pengiriman</span>
                              <span class="summary-value shipping-cost">$7.00</span>
                           </div>
                           <div class="summary-row total-row">
                              <span class="summary-label total-label">Total Pembayaran</span>
                              <span class="summary-value total-value">$65.00</span>
                           </div>
                        </div>

                        <!-- Promo Code Section -->
                        <div class="promo-section">
                           <div class="promo-input-group">
                              <input type="text" class="promo-input" placeholder="Masukkan kode promo">
                              <button type="button" class="promo-button">
                                 <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </section>
      <!-- checkout-area end -->

@endsection
