@extends('Layout.Admin')

@section('content')

            <!-- Start Container Fluid -->
            <div class="container-xxl">

                <div class="row">
                     <div class="col-lg-4">
                          <div class="card">
                              
                               <div class="card-body">
                                    <!-- Crossfade -->
                                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                         <div class="carousel-inner" role="listbox">
                                              <div class="carousel-item active">
                                                   <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid bg-light rounded">
                                              </div>
                                         </div>
                                    </div>
                               </div>
                          </div>
                     </div>
                     <div class="col-lg-8">
                          <div class="card">
                              <div class="card-header">
                                    <h4 class="text-dark fw-medium">Product Details</h4>
                              </div>
                               <div class="card-body">
                                    <p class="mb-1">
                                         <a href="#!" class="fs-24 text-dark fw-medium">{{ $product->name }}</a>
                                    </p>
                                    <div class="d-flex gap-2 align-items-center">
                                         <ul class="d-flex text-warning m-0 fs-20  list-unstyled">
                                              <li>
                                                   <i class="bx bxs-star"></i>
                                              </li>
                                              <li>
                                                   <i class="bx bxs-star"></i>
                                              </li>
                                              <li>
                                                   <i class="bx bxs-star"></i>
                                              </li>
                                              <li>
                                                   <i class="bx bxs-star"></i>
                                              </li>
                                              <li>
                                                   <i class="bx bxs-star-half"></i>
                                              </li>
                                         </ul>
                                         <p class="mb-0 fw-medium fs-18 text-dark">4.5 <span class="text-muted fs-13">(55 Review)</span></p>
                                    </div>
                                    <h2 class="fw-medium my-3">${{ $product->price }}</h2>

                                    <div class="quantity mt-4">
                                         <h4 class="text-dark fw-medium mt-3">Quantity : <span>{{ $product->stock }}</span> </h4>
                                    </div>

                                    <h4 class="text-dark fw-medium">Description :</h4>
                                    <p class="text-muted">{{ $product->description }}</p>
                                    <div class="">
                                         <ul class="d-flex flex-column gap-2 list-unstyled fs-14 text-muted mb-0">
                                              <li><span class="fw-medium text-dark">Product Weights</span><span class="mx-2">:</span>{{ $product->weight }} Grams</li>
                                              <li><span class="fw-medium text-dark">Product Dimensions</span><span class="mx-2">:</span>{{ $product->dimension }}</li>                                              
                                             <li><span class="fw-medium text-dark">Product Materials</span><span class="mx-2">:</span>{{ $product->material }}</li>
                                         </ul>
                                    </div>                                    
                               </div>
                          </div>
                     </div>
                </div>
                <div class="row">

                     <div>
                          <div class="card">
                               <div class="card-header">
                                    <h4 class="card-title">Top Review From World</h4>
                               </div>
                               <div class="card-body">
                                    <div class="d-flex align-items-center gap-2">
                                         <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-md rounded-circle">
                                         <div>
                                              <h5 class="mb-0">Henny K. Mark</h5>
                                         </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mt-3 mb-1">
                                         <ul class="d-flex text-warning m-0 fs-20 list-unstyled">
                                              <li>
                                                   <i class="bx bxs-star"></i>
                                              </li>
                                              <li>
                                                   <i class="bx bxs-star"></i>
                                              </li>
                                              <li>
                                                   <i class="bx bxs-star"></i>
                                              </li>
                                              <li>
                                                   <i class="bx bxs-star"></i>
                                              </li>
                                              <li>
                                                   <i class="bx bxs-star-half"></i>
                                              </li>
                                         </ul>
                                         <p class="fw-medium mb-0 text-dark fs-15">Excellent Quality</p>
                                    </div>

                                    <p class="mb-0 text-dark fw-medium fs-15">Reviewed in Canada on 16 November 2023</p>
                                    <p class="text-muted">Medium thickness. Did not shrink after wash. Good elasticity . XL size Perfectly fit for 5.10 height and heavy body. Did not fade after wash. Only for maroon colour t-shirt colour lightly gone in first wash but not faded. I bought 5 tshirt of different colours. Highly recommended in so low price.</p>
                                    <div class="mt-2">
                                         <a href="#!" class="fs-14 me-3 text-muted"><i class='bx bx-like'></i> Helpful</a>
                                         <a href="#!" class="fs-14 text-muted">Report</a>
                                    </div>

                                    <hr class="my-3">

                                    <div class="d-flex align-items-center gap-2">
                                         <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-md rounded-circle">
                                         <div>
                                              <h5 class="mb-0">Jorge Herry</h5>
                                         </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mt-3 mb-1">
                                         <ul class="d-flex text-warning m-0 fs-20 list-unstyled">
                                              <li>
                                                   <i class="bx bxs-star"></i>
                                              </li>
                                              <li>
                                                   <i class="bx bxs-star"></i>
                                              </li>
                                              <li>
                                                   <i class="bx bxs-star"></i>
                                              </li>
                                              <li>
                                                   <i class="bx bxs-star"></i>
                                              </li>
                                              <li>
                                                   <i class="bx bxs-star-half"></i>
                                              </li>
                                         </ul>
                                         <p class="fw-medium mb-0 text-dark fs-15">Good Quality</p>
                                    </div>

                                    <p class="mb-0 text-dark fw-medium fs-15">Reviewed in U.S.A on 21 December 2023

                                    </p>
                                    <p class="text-muted mb-0">I liked the tshirt, it's pure cotton &amp; skin friendly, but the size is smaller to compare standard size.</p>
                                    <p class="text-muted mb-0">best rated</p>

                                    <div class="mt-2">
                                         <a href="#!" class="fs-14 me-3 text-muted"><i class='bx bx-like'></i> Helpful</a>
                                         <a href="#!" class="fs-14 text-muted">Report</a>
                                    </div>
                               </div>
                          </div>
                     </div>
                </div>

            </div>

@endsection        