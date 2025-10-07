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
                     <div class="your-order-checkout">
                        <h3>Your order</h3>
                        <div class="your-order-table-checkout table-responsive">
                           <table>
                              <thead>
                                 <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr class="cart_item">
                                    <td class="product-name">
                                       Alexander Sofa<strong class="product-quantity"> × 1</strong>
                                    </td>
                                    <td class="product-total">
                                       <span class="amount">$24.00</span>
                                    </td>
                                 </tr>
                                 <tr class="cart_item">
                                    <td class="product-name">
                                       Curaskin Lipgel<strong class="product-quantity"> ×
                                          1</strong>
                                    </td>
                                    <td class="product-total">
                                       <span class="amount">$12.00</span>
                                    </td>
                                 </tr>
                                 <tr class="cart_item">
                                    <td class="product-name">
                                       Leather Chair<strong class="product-quantity"> ×
                                          1</strong>
                                    </td>
                                    <td class="product-total">
                                       <span class="amount">$22.00</span>
                                    </td>
                                 </tr>
                              </tbody>
                              <tfoot>
                                 <tr class="cart-subtotal">
                                    <th>Cart Subtotal</th>
                                    <td><span class="amount">$58.00</span></td>
                                 </tr>
                                 <tr class="shipping-checkout">
                                    <th>Shipping</th>
                                    <td>
                                       <ul>
                                          <li>
                                             <input type="radio">
                                             <label>
                                                Flat Rate: <span class="amount">$7.00</span>
                                             </label>
                                          </li>
                                          <li>
                                             <input type="radio">
                                             <label>Free Shipping:</label>
                                          </li>
                                       </ul>
                                    </td>
                                 </tr>
                                 <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">$85.00</span></strong>
                                    </td>
                                 </tr>
                              </tfoot>
                           </table>
                        </div>

                        <div class="payment-method-checkout">
                           <div class="accordion-checkout" id="checkoutAccordion">
                              <div class="accordion-item-checkout">
                                 <h2 class="accordion-header-checkout" id="checkoutOne">
                                    <button class="accordion-button-checkout" type="button" data-bs-toggle="collapse"
                                       data-bs-target="#bankOne" aria-expanded="true" aria-controls="bankOne">
                                       Direct Bank Transfer
                                    </button>
                                 </h2>
                                 <div id="bankOne" class="accordion-collapse collapse show"
                                    aria-labelledby="checkoutOne" data-bs-parent="#checkoutAccordion">
                                    <div class="accordion-body-checkout">
                                       Make your payment directly into our bank account. Please use your
                                       Order ID
                                       as the payment reference. Your order won't be shipped until the
                                       funds have
                                       cleared in our account.
                                    </div>
                                 </div>
                              </div>
                              <div class="accordion-item-checkout">
                                 <h2 class="accordion-header-checkout" id="paymentTwo">
                                    <button class="accordion-button-checkout collapsed" type="button" data-bs-toggle="collapse"
                                       data-bs-target="#payment" aria-expanded="false" aria-controls="payment">
                                       Cheque Payment
                                    </button>
                                 </h2>
                                 <div id="payment" class="accordion-collapse collapse" aria-labelledby="paymentTwo"
                                    data-bs-parent="#checkoutAccordion">
                                    <div class="accordion-body-checkout">
                                       Please send your cheque to Store Name, Store Street, Store Town,
                                       Store
                                       State / County, Store
                                       Postcode.
                                    </div>
                                 </div>
                              </div>
                              <div class="accordion-item-checkout">
                                 <h2 class="accordion-header-checkout" id="paypalThree">
                                    <button class="accordion-button-checkout collapsed" type="button" data-bs-toggle="collapse"
                                       data-bs-target="#paypal" aria-expanded="false" aria-controls="paypal">
                                       PayPal
                                    </button>
                                 </h2>
                                 <div id="paypal" class="accordion-collapse collapse" aria-labelledby="paypalThree"
                                    data-bs-parent="#checkoutAccordion">
                                    <div class="accordion-body-checkout">
                                       Pay via PayPal; you can pay with your credit card if you don't have
                                       a
                                       PayPal account.
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="order-button-payment-checkout mt-20">
                              <button class="fill-btn" type="submit">
                                 <span class="fill-btn-inner">
                                    <span class="fill-btn-normal">Place order</span>
                                    <span class="fill-btn-hover">Place order</span>
                                 </span>
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
