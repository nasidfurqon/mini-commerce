@extends('Layout.Admin')

@section('content')
   
      

               
               <div class="container-xxl">

                    <div class="row">


                         <div>
                              <form action="{{ route('admin.categories.store') }}" method="POST">
                                   @csrf
                                   <div class="card">
                                        <div class="card-header">
                                             <h4 class="card-title">Add Category</h4>
                                        </div>
                                        <div class="card-body">
                                             <div class="row">
                                                  <div class="col-lg-6">
                                                       <div class="mb-3">
                                                            <label for="category-title" class="form-label">Category Title</label>
                                                            <input type="text" id="category-title" name="name" class="form-control" placeholder="Enter Title" required>
                                                       </div>
                                                  </div>
                                                  <div class="col-lg-6">
                                                       <div class="mb-3">
                                                            <label for="category-icon" class="form-label">Category Icon</label>
                                                            <button type="button" id="icon-selector-btn" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-between" data-bs-toggle="modal" data-bs-target="#iconModal">
                                                                 <span class="d-flex align-items-center">
                                                                      <i id="selected-icon" class="fas fa-question me-2" style="font-size: 1.2rem;"></i>
                                                                      <span id="selected-icon-text">Select Icon</span>
                                                                 </span>
                                                                 <i class="fas fa-chevron-down"></i>
                                                            </button>
                                                            <input type="hidden" id="category-icon" name="icon" value="" required>
                                                            <small class="form-text text-muted">Click to select an icon</small>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="p-3 bg-light mb-3 rounded">
                                        <div class="row justify-content-end g-2">
                                             <div class="col-lg-2">
                                                  <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary w-100 h-100 d-flex justify-content-center align-items-center">Cancel</a>
                                             </div>                                             
                                             <div class="col-lg-2">
                                                  <button type="submit" class="btn btn-primary w-100">Save Change</button>
                                             </div>
                                        </div>
                                   </div>
                              </form>
                         </div>
                    </div>

                    @include('Component.Icon-Modal')
               </div>
               
@endsection
     




