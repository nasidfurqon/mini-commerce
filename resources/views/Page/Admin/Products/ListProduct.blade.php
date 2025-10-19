
@extends('Layout.Admin')

@section('content')

               
               <div class="container-fluid">

                    <div class="row">
                         <div class="col-xl-12">
                              <div class="card">
                                   <div class="card-header d-flex justify-content-between align-items-center">
                                        <h4 class="card-title mb-0">All Product List</h4>
                                        <div class="d-flex align-items-center gap-2">
                                             <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary btn-sm d-flex align-items-center">
                                                  <span>Back</span>
                                             </a>
                                             <a href="{{ route('admin.products.add', ['category' => $category->id]) }}" class="btn btn-primary btn-sm">
                                                  Add Product
                                             </a>
                                        </div>
                                   </div>
                                   <div>
                                        <div class="table-responsive">
                                             <table class="table align-middle mb-0 table-hover table-centered">
                                                  <thead class="bg-light-subtle">
                                                       <tr>
                                                            <th>Product Name</th>
                                                            <th class="text-end">Price</th>
                                                            <th class="text-center">Stock</th>
                                                            <th>Category</th>
                                                            <th class="text-center">Action</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @foreach ($products as $product)                                                            
                                                       <tr>                                                           
                                                            <td>
                                                                 <div class="d-flex align-items-center gap-2">
                                                                     <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                                         <img src="{{ asset('storage/' . ltrim($product->image, '/')) }}" alt="{{ $product->name }}" class="img-fluid rounded" style="width: 50px; height: 50px; object-fit: cover;" />
                                                                     </div>
                                                                      <div>
                                                                           <a href="{{ route('admin.products.detail',['id'=>$product->id]) }}" class="text-dark fw-medium fs-15">{{ $product->name }}</a>
                                                                      </div>
                                                                 </div>

                                                            </td>
                                                            <td class="text-end">Rp {{ number_format($product->price,2,',','.') }}</td>
                                                            <td class="text-center">
                                                                 <p class="mb-1 text-muted"><span class="text-dark fw-medium">{{ $product->stock }} Item</span> Left</p>
                                                            </td>
                                                            <td>{{ $product->category->name }}</td>
                                                            <td class="text-center">
                                                                 <div class="d-inline-flex gap-2 align-items-center justify-content-center">
                                                                     <a href="{{ route('admin.products.detail', $product->id) }}" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                                      <a href="{{ route('admin.products.edit', ['id'=>$product->id, 'category'=>$category->id]) }}" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                                      <button class="btn btn-soft-danger btn-sm" id="deleteProduct{{ $product->id }}" data-form-id="deleteProductForm{{ $product->id }}" data-nama="{{ $product->name }}" data-type="product"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></button>
                                                                      <form action="{{ route('admin.products.destroy',['product'=>$product->id]) }}" method="POST" id="deleteProductForm{{ $product->id }}" hidden>@csrf @method('DELETE')</form>
                                                                 </div>
                                                            </td>
                                                       </tr>
                                                       @endforeach
                                                  </tbody>
                                             </table>
                                        </div>
                                        
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