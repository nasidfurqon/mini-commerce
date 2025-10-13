@extends('Layout.Admin')

@section('content')

               <!-- Start Container Fluid -->
               <div class="container-xxl">

                   <div class="row">
                        <div class="col-md-6 col-xl-3">
                             <div class="card">
                                  <div class="card-body">
                                       <div class="d-flex align-items-center">
                                            <div class="rounded bg-secondary-subtle avatar-md d-flex align-items-center justify-content-center me-3">
                                                 <iconify-icon icon="solar:tag-linear" class="fs-24 text-secondary"></iconify-icon>
                                            </div>
                                            <div>
                                                 <h4 class="mb-1">{{ $categoriesCount }}</h4>
                                                 <p class="text-muted mb-0">Total Categories</p>
                                            </div>
                                       </div>
                                  </div>
                             </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                             <div class="card">
                                  <div class="card-body">
                                       <div class="d-flex align-items-center">
                                            <div class="rounded bg-primary-subtle avatar-md d-flex align-items-center justify-content-center me-3">
                                                 <iconify-icon icon="solar:box-linear" class="fs-24 text-primary"></iconify-icon>
                                            </div>
                                            <div>
                                                 <h4 class="mb-1">{{ $productsCount }}</h4>
                                                 <p class="text-muted mb-0">Total Products</p>
                                            </div>
                                       </div>
                                  </div>
                             </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                             <div class="card">
                                  <div class="card-body">
                                       <div class="d-flex align-items-center">
                                            <div class="rounded bg-warning-subtle avatar-md d-flex align-items-center justify-content-center me-3">
                                                 <iconify-icon icon="solar:check-circle-linear" class="fs-24 text-warning"></iconify-icon>
                                            </div>
                                            <div>
                                                 <h4 class="mb-1">{{ $activeProducts }}</h4>
                                                 <p class="text-muted mb-0">Active Products</p>
                                            </div>
                                       </div>
                                  </div>
                             </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                             <div class="card">
                                  <div class="card-body">
                                       <div class="d-flex align-items-center">
                                            <div class="rounded bg-info-subtle avatar-md d-flex align-items-center justify-content-center me-3">
                                                 <iconify-icon icon="solar:close-circle-linear" class="fs-24 text-info"></iconify-icon>
                                            </div>
                                            <div>
                                                 <h4 class="mb-1">{{ $inactiveProducts }}</h4>
                                                 <p class="text-muted mb-0">Inactive Products</p>
                                            </div>
                                       </div>
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
                                                                      <button type="button" class="btn btn-soft-danger btn-sm" id="deleteCategory{{ $category->id }}" data-form-id="deleteCategoryForm{{ $category->id }}" data-nama="{{ $category->name }}" data-type="category"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></button>    
                                                                      <form action="{{ route('admin.categories.destroy',['category'=>$category->id]) }}" method="POST" id="deleteCategoryForm{{ $category->id }}" hidden>@csrf @method('DELETE')</form>                                                               
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
                                        @if ($categories->hasPages())
                                        <nav aria-label="Page navigation example">
                                             <ul class="pagination justify-content-end mb-0">
                                                  <li class="page-item {{ $categories->onFirstPage() ? 'disabled' : '' }}">
                                                       <a class="page-link" href="{{ $categories->previousPageUrl() }}" tabindex="-1">Previous</a>
                                                  </li>
                                                  @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                                                       <li class="page-item {{ $page == $categories->currentPage() ? 'active' : '' }}">
                                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                       </li>
                                                  @endforeach
                                                  <li class="page-item {{ $categories->hasMorePages() ? '' : 'disabled' }}">
                                                       <a class="page-link" href="{{ $categories->nextPageUrl() }}">Next</a>
                                                  </li>
                                             </ul>
                                        </nav>
                                        @endif
                                   </div>
                              </div>
                         </div>
                    </div>

               </div>
               <!-- End Container Fluid -->

@endsection