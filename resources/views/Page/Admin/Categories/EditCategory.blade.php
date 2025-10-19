@extends('Layout.Admin')

@section('content')

               
               <div class="container-xxl">

                    <div class="row">
                         <div class="col-xl-3 col-lg-4">
                              <div class="card">
                                   <div class="card-body">
                                        <div class="bg-light text-center rounded bg-light">
                                             <img src="assets/images/product/p-1.png" alt="" class="avatar-xxl">
                                        </div>
                                        <div class="mt-3">
                                             <h4>{{ $category->name }}</h4>
                                             <div class="row">
                                                  <div class="col-lg-4 col-4">
                                                       <p class="mb-1 mt-2">Created By :</p>
                                                       <h5 class="mb-0">Seller</h5>
                                                  </div>
                                                  <div class="col-lg-4 col-4">
                                                       <p class="mb-1 mt-2">Stock :</p>
                                                       <h5 class="mb-0">{{ $category->products->count() }}</h5>
                                                  </div>                                   
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>

                         <div class="col-xl-9 col-lg-8 ">
                              <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                                   @csrf
                                   @method('PUT')
                                   <div class="card">
                                        <div class="card-header">
                                             <h4 class="card-title">Edit Category</h4>
                                        </div>
                                        <div class="card-body">
                                             <div class="row">
                                                  <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                 <label for="category-title" class="form-label">Category Title</label>
                                                                 <input type="text" id="category-title" name="name" class="form-control" placeholder="Enter Title" value="{{ $category->name }}" required>
                                                            </div>
                                                  </div>
                                                  <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                 <label for="category-icon" class="form-label">Category Icon</label>
                                                                 <button type="button" id="icon-selector-btn" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-between" data-bs-toggle="modal" data-bs-target="#iconModal">
                                                                      <span class="d-flex align-items-center">
                                                                           <i id="selected-icon" class="{{ $category->icon ?: 'fas fa-question' }} me-2" style="font-size: 1.2rem;"></i>
                                                                           <span id="selected-icon-text">{{ $category->icon ? 'Icon Selected' : 'Select Icon' }}</span>
                                                                      </span>
                                                                      <i class="fas fa-chevron-down"></i>
                                                                 </button>
                                                                 <input type="hidden" id="category-icon" name="icon" value="{{ $category->icon }}" required>
                                                                 <small class="form-text text-muted">Click to select a Font Awesome icon</small>
                                                            </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="p-3 bg-light mb-3 rounded">
                                        <div class="row justify-content-end g-2">
                                             <div class="col-lg-2">
                                                  <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary w-100 d-flex justify-content-center align-items-center">Cancel</a>
                                             </div>                                             
                                             <div class="col-lg-2">
                                                  <button type="submit" class="btn btn-primary w-100 h-auto d-flex justify-content-center align-items-center">Save Change</button>
                                             </div>
                                        </div>
                                   </div>
                              </form>
                         </div>
                    </div>
                    @include('Component.Icon-Modal')
               </div>
@endsection

          


