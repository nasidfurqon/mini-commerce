@extends('Layout.Admin')

@section('content')

               <!-- Start Container Fluid -->
               <div class="container-xxl">

                    <div class="row">
                         <div class="col-md-6 col-xl-3">
                              <div class="card">
                                   <div class="card-body text-center">
                                        <div class="rounded bg-secondary-subtle d-flex align-items-center justify-content-center mx-auto">
                                             <img src="assets/images/product/p-1.png" alt="" class="avatar-xl">
                                        </div>
                                        <h4 class="mt-3 mb-0">Fashion Categories</h4>
                                   </div>
                              </div>
                         </div>
                         <div class="col-md-6 col-xl-3">
                              <div class="card">
                                   <div class="card-body text-center">
                                        <div class="rounded bg-primary-subtle d-flex align-items-center justify-content-center mx-auto">
                                             <img src="assets/images/product/p-6.png" alt="" class="avatar-xl">
                                        </div>
                                        <h4 class="mt-3 mb-0">Electronics Headphone</h4>
                                   </div>
                              </div>
                         </div>

                         <div class="col-md-6 col-xl-3">
                              <div class="card">
                                   <div class="card-body text-center">
                                        <div class="rounded bg-warning-subtle d-flex align-items-center justify-content-center mx-auto">
                                             <img src="assets/images/product/p-7.png" alt="" class="avatar-xl">
                                        </div>
                                        <h4 class="mt-3 mb-0">Foot Wares</h4>
                                   </div>
                              </div>
                         </div>

                         <div class="col-md-6 col-xl-3">
                              <div class="card">
                                   <div class="card-body text-center">
                                        <div class="rounded bg-info-subtle d-flex align-items-center justify-content-center mx-auto">
                                             <img src="assets/images/product/p-9.png" alt="" class="avatar-xl">
                                        </div>
                                        <h4 class="mt-3 mb-0">Eye Ware & Sunglass</h4>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="row">
                         <div class="col-xl-12">
                              <div class="card">
                                   <div class="card-header d-flex justify-content-between align-items-center gap-1">
                                        <h4 class="card-title flex-grow-1">All Categories List</h4>

                                        <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary">
                                             Add Category
                                        </a>

                                        <div class="dropdown">
                                             <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                  This Month
                                             </a>
                                             <div class="dropdown-menu dropdown-menu-end">
                                                  <!-- item-->
                                                  <a href="#!" class="dropdown-item">Download</a>
                                                  <!-- item-->
                                                  <a href="#!" class="dropdown-item">Export</a>
                                                  <!-- item-->
                                                  <a href="#!" class="dropdown-item">Import</a>
                                             </div>
                                        </div>
                                   </div>
                                   <div>
                                        <div class="table-responsive">
                                             <table class="table align-middle mb-0 table-hover table-centered">
                                                  <thead class="bg-light-subtle">
                                                       <tr>
                                                            <th style="width: 20px;">
                                                                 <div class="form-check">
                                                                      <input type="checkbox" class="form-check-input" id="customCheck1">
                                                                      <label class="form-check-label" for="customCheck1"></label>
                                                                 </div>
                                                            </th>
                                                            <th style="width: 50px;">Icon</th>
                                                            <th style="width: 200px;">Categories</th>
                                                            <th style="width: 80px; text-align: center;">Products</th>
                                                            <th style="width: 50px; text-align: center;">Action</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @forelse($categories as $category)
                                                       <tr>
                                                            <td>
                                                                 <div class="form-check">
                                                                      <input type="checkbox" class="form-check-input" id="customCheck{{ $category->id }}">
                                                                      <label class="form-check-label" for="customCheck{{ $category->id }}"></label>
                                                                 </div>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                
                                                                      <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                                           <i class="{{ $category->icon }} fs-24 text-primary"></i>
                                                                      </div>
                                                            
                                                            </td>
                                                            <td>{{ $category->name }}</td>
                                                            <td style="text-align: center;">{{ $category->products->count() }}</td>
                                                            <td style="text-align: center;">
                                                                 <div class="d-flex gap-2">
                                                                      <a href="{{ route('admin.products.index', $category->id) }}" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                                      <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                                      <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                                                           @csrf
                                                                           @method('DELETE')
                                                                           <button type="submit" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></button>
                                                                      </form>
                                                                 </div>
                                                            </td>
                                                       </tr>
                                                       @empty
                                                       <tr>
                                                            <td colspan="7" class="text-center py-4">
                                                                 <p class="text-muted mb-0">No products found.</p>
                                                            </td>
                                                       </tr>
                                                       @endforelse
                                                  </tbody>
                                             </table>
                                        </div>
                                        <!-- end table-responsive -->
                                   </div>
                                   <div class="card-footer border-top">
                                        <nav aria-label="Page navigation example">
                                             <ul class="pagination justify-content-end mb-0">
                                                  <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                                                  <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                                  <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                  <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                  <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                                             </ul>
                                        </nav>
                                   </div>
                              </div>
                         </div>
                    </div>

               </div>
               <!-- End Container Fluid -->

@endsection