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
                <div class="text-end mt-3">
                     <a href="{{ route('admin.products.index', $product->category_id) }}" class="btn btn-outline-secondary btn-lg">Back to List</a>
                 </div>
            </div>

@endsection