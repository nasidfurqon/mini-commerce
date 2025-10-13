
@extends('Layout.Admin')

@section('content')

               <!-- Start Container Fluid -->
               <div class="container-fluid">

                    <div class="row">
                         <div class="col-xl-12">
                              <div class="card">
                                   <div class="card-header d-flex justify-content-between align-items-center gap-1">
                                        <h4 class="card-title flex-grow-1">All Product List</h4>
                                        
                                        <a href="{{ route('admin.products.add') }}" class="btn btn-sm btn-primary">
                                             Add Product
                                        </a>
                                   </div>
                                   <div>
                                        <div class="table-responsive">
                                             <table class="table align-middle mb-0 table-hover table-centered">
                                                  <thead class="bg-light-subtle">
                                                       <tr>
                                                            <th style="width: 20px;">
                                                                 <div class="form-check ms-1">
                                                                      <input type="checkbox" class="form-check-input" id="customCheck1">
                                                                      <label class="form-check-label" for="customCheck1"></label>
                                                                 </div>
                                                            </th>
                                                            <th>Product Name & Size</th>
                                                            <th>Price</th>
                                                            <th>Stock</th>
                                                            <th>Category</th>
                                                            <th>Rating</th>
                                                            <th>Action</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @foreach ($products as $product)                                                            
                                                       <tr>
                                                            <td>
                                                                 <div class="form-check ms-1">
                                                                      <input type="checkbox" class="form-check-input" id="customCheck2">
                                                                      <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                                 </div>
                                                            </td>
                                                            <td>
                                                                 <div class="d-flex align-items-center gap-2">
                                                                     <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                                         <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded" style="width: 50px; height: 50px; object-fit: cover;" />
                                                                     </div>
                                                                      <div>
                                                                           <a href="#!" class="text-dark fw-medium fs-15">{{ $product->name }}</a>
                                                                      </div>
                                                                 </div>

                                                            </td>
                                                            <td>$ {{ $product->price }}</td>
                                                            <td>
                                                                 <p class="mb-1 text-muted"><span class="text-dark fw-medium">{{ $product->stock }} Item</span> Left</p>
                                                                 <p class="mb-0 text-muted">155 Sold</p>
                                                            </td>
                                                            <td> {{ $product->category->name }}</td>
                                                            <td> <span class="badge p-1 bg-light text-dark fs-12 me-1"><i class="bx bxs-star align-text-top fs-14 text-warning me-1"></i> 4.5</span> 55 Review</td>
                                                            <td>
                                                                 <div class="d-flex gap-2">
                                                                     <a href="{{ route('admin.products.detail', $product->id) }}" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                                      <a href="#!" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                                      <button class="btn btn-soft-danger btn-sm" id="deleteProduct{{ $product->id }}" data-form-id="deleteProductForm{{ $product->id }}" data-nama="{{ $product->name }}" data-type="product"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></button>
                                                                      <form action="{{ route('admin.products.destroy',['product'=>$product->id]) }}" method="POST" id="deleteProductForm{{ $product->id }}" hidden>@csrf @method('DELETE')</form>
                                                                 </div>
                                                            </td>
                                                       </tr>
                                                       @endforeach
                                                  </tbody>
                                             </table>
                                        </div>
                                        <!-- end table-responsive -->
                                   </div>
                                   <div class="card-footer border-top">
                                        @if ($products->hasPages())
                                        <nav aria-label="Page navigation example">
                                             <ul class="pagination justify-content-end mb-0">
                                                  <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                                                       <a class="page-link" href="{{ $products->previousPageUrl() }}" tabindex="-1">Previous</a>
                                                  </li>
                                                  @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                                       <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                       </li>
                                                  @endforeach
                                                  <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                                                       <a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a>
                                                  </li>
                                             </ul>
                                        </nav>
                                        @endif
                                   </div>
                              </div>
                         </div>

                    </div>

               </div>





@endsection