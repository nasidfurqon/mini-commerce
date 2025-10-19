@extends('Layout.Admin')

@section('content')

               <!-- Start Container Fluid -->
               <div class="container-xxl">

                    <div class="row">
                         <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="card mb-3">
                                   <div class="card-header">
                                        <h4 class="card-title">Product Information</h4>
                                   </div>
                                   <div class="card-body">
                                        <div class="row">
                                             <div class="col-lg-4">
                                                  <div class="mb-3">
                                                       <label for="name" class="form-label">Product Name</label>
                                                       <input type="text" id="name" class="form-control" placeholder="Items Name" name="name">
                                                  </div>
                                             </div>
                                             <div class="col-lg-4">
                                                  <label for="product-categories" class="form-label">Product Categories</label>
                                                  @php $selectedCategoryId = request('category'); @endphp
                                                  <select class="form-control" id="product-categories" data-choices data-choices-groups data-placeholder="Select Categories" name="category_id" {{ $selectedCategoryId ? 'disabled' : '' }}>
                                                       <option value="">Choose a categories</option>
                                                       @foreach($categories as $cat)
                                                           <option value="{{ $cat->id }}" {{ $selectedCategoryId == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                                       @endforeach
                                                  </select>
                                                  @if($selectedCategoryId)
                                                       <input type="hidden" name="category_id" value="{{ $selectedCategoryId }}">
                                                       <small class="text-muted">Kategori telah dipilih dari halaman sebelumnya.</small>
                                                  @endif
                                             </div>
                                             <div class="col-lg-4">
                                                  <div class="mb-3">
                                                       <label for="stock" class="form-label">Stock</label>
                                                       <input type="number" id="stock" class="form-control" placeholder="Items Stock" name="stock">
                                                  </div>
                                             </div>                                             
                                        </div>
                                        <div class="row">
                                             <div class="col-lg-3 col-md-6">
                                                  <div class="mb-3">
                                                       <label for="weight" class="form-label">Weight</label>
                                                       <input type="number" id="weight" class="form-control" placeholder="In grams" name="weight" step="0.01">
                                                  </div>
                                             </div>
                                             <div class="col-lg-3 col-md-6">
                                                  <div class="mb-3">
                                                       <label for="dimension" class="form-label">Dimension</label>
                                                       <input type="text" id="dimension" class="form-control" placeholder="ex: 10x10x10" name="dimension">
                                                  </div>
                                             </div>
                                             <div class="col-lg-3 col-md-6">
                                                  <div class="mb-3">
                                                       <label for="material" class="form-label">Materials</label>
                                                       <input type="text" name="material" id="material" class="form-control" placeholder="ex: cotton, polyester">
                                                  </div>
                                             </div>
                                             <div class="col-lg-3 col-md-6">
                                                  <label for="product-price" class="form-label">Price</label>
                                                  <div class="input-group mb-3">
                                                       <span class="input-group-text">Rp</span>
                                                       <input type="number" id="product-price" class="form-control" name="price">
                                                  </div>
                                             </div>
                                        </div>              
                                        <div class="row">
                                             <div class="col-lg-12">
                                                  <div class="mb-3">
                                                       <label for="description" class="form-label">Description</label>
                                                       <textarea class="form-control bg-light-subtle" id="description" rows="7" placeholder="Short description about the product" name="description"></textarea>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>


                              <div class="row">
                                   <div class="col-lg-6">
                                        <div class="card h-100 mb-3">
                                             <div class="card-header">
                                                  <h4 class="card-title">Add Product Photo</h4>
                                             </div>
                                             <div class="card-body">
                                                  <!-- File Upload -->
                                                  <div class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-max-files="1" data-upload-multiple="false" data-parallel-uploads="1">
                                                       <div class="fallback">
                                                            <input name="file" type="file" accept="image/*"/>
                                                       </div>
                                                       <div class="dz-message needsclick">
                                                            <i class="bx bx-cloud-upload fs-48 text-primary"></i>
                                                            <h3 class="mt-4">Drop your images here, or <span class="text-primary">click to browse</span></h3>
                                                            <span class="text-muted fs-13">
                                                                 1600 x 1200 (4:3) recommended. PNG, JPG and GIF files are allowed
                                                            </span>
                                                       </div>
                                                  </div>
                                                  <!-- Previews container moved to right card -->
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-lg-6">
                                        <div class="card h-100 mb-3">
                                             <div class="card-header">
                                                  <h4 class="card-title">Upload Previews</h4>
                                             </div>
                                             <div class="card-body">
                                                  <div id="file-previews" class="dz-previews"></div>
                                             </div>
                                         </div>
                                   </div>
                              </div>    

                              {{-- ini gausah diotak atik --}}
                              <div class="d-none">
                                   <input type="hidden" name="is_active" value="1">
                                   <input type="hidden" name="image" id="image">
                              </div>


                              <div class="p-3 bg-light rounded">
                                   <div class="row justify-content-end g-2">
                                        <div class="col-lg-2">
                                             <a href="{{ request('category') ? route('admin.products.index',['category'=>request('category')]) : route('admin.categories.index') }}" class="btn btn-outline-secondary w-100">Cancel</a>
                                        </div>
                                        <div class="col-lg-2">
                                             <button type="submit" class="btn btn-primary w-100">Create Product</button>
                                        </div>
                                   </div>
                              </div>
                         </form>
                    </div>
               </div>
               <!-- End Container Fluid -->
    

@endsection

<style>
/* Tidy Dropzone preview layout */
#file-previews.dz-previews {
  display: flex;
  flex-direction: column;
  gap: 12px;
}
#file-previews.row { margin-left: 0 !important; margin-right: 0 !important; }
#file-previews .dz-preview {
  display: grid;
  grid-template-columns: 64px minmax(0, 1fr) auto;
  align-items: center;
  gap: 12px;
  padding: 10px 12px;
  border: 1px dashed #dee2e6;
  border-radius: 12px;
  background: #fff;
  box-shadow: 0 1px 2px rgba(16,24,40,.05);
  position: relative;
}
#file-previews .dz-image {
  width: 64px;
  height: 64px;
  border-radius: 8px;
  overflow: hidden;
}
#file-previews .dz-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
#file-previews .dz-details { margin: 0; min-width: 0; overflow: hidden; }
#file-previews .dz-filename { font-weight: 500; font-size: 14px; color: #212529; overflow: hidden; }
#file-previews .dz-filename span { white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%; display: inline-block; }
#file-previews .dz-size { color: #6c757d; font-size: 12px; margin-left: 6px; }
#file-previews .dz-progress {
  grid-column: 2;
  height: 6px;
  background: #e9ecef;
  border-radius: 4px;
  overflow: hidden;
  margin-top: 6px;
}
#file-previews .dz-upload { background: #0d6efd; height: 100%; }
#file-previews .dz-remove {
  grid-column: 3;
  align-self: center;
  text-decoration: none;
  padding: 6px 10px;
  border-radius: 6px;
  font-size: 12px;
  border: 1px solid #dc3545;
  color: #dc3545;
  background: transparent;
  transition: .2s;
}
#file-previews .dz-remove:hover { background: #dc3545; color: #fff; }
#file-previews .dz-success .dz-progress { display: none; }
#file-previews .dz-success-mark, #file-previews .dz-error-mark { display: none; }
#file-previews .dz-error-message {
  display: none;
  position: absolute;
  left: 12px;
  bottom: -30px;
  background: #dc3545;
  color: #fff;
  padding: 6px 10px;
  border-radius: 6px;
  font-size: 12px;
}
#file-previews .dz-preview:hover .dz-error-message { display: none; }
#file-previews .dz-preview.dz-error .dz-error-message { display: block; }
@media (max-width: 576px) {
  #file-previews .dz-preview { grid-template-columns: 56px 1fr auto; }
  #file-previews .dz-image { width: 56px; height: 56px; }
}
</style>

<script>
 document.addEventListener('DOMContentLoaded', function () {
   if (window.Dropzone) {
     Dropzone.autoDiscover = false;
     var dzElem = document.getElementById('myAwesomeDropzone');
     if (dzElem && !dzElem.dropzone) {
       new Dropzone(dzElem, {
         url: "{{ route('admin.products.upload') }}",
         paramName: 'file',
         headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
         maxFilesize: 4,
         maxFiles: 1,
         acceptedFiles: 'image/*',
         addRemoveLinks: true,
         previewsContainer: '#file-previews',
         params: { path: 'products' },
         uploadMultiple: false,
         parallelUploads: 1,
         init: function() {
           this.on('addedfile', function(file) {
             var pv = file.previewElement;
             if (pv) {
               var nameEl = pv.querySelector('.dz-filename span');
               if (nameEl) {
                 nameEl.title = file.name;
                 if (nameEl.textContent && nameEl.textContent.length > 80) {
                   nameEl.textContent = file.name.slice(0, 77) + '...';
                 }
               }
             }
           });
           this.on('maxfilesexceeded', function(file) {
             this.removeAllFiles();
             this.addFile(file);
           });
           this.on('success', function(file, response) {
             var data = response;
             try { if (typeof response === 'string') { data = JSON.parse(response); } } catch (e) {}
             var url = data && data.url ? data.url : null;
             var input = document.querySelector('input[name="image"]');
             if (input) { input.value = url || ''; }
           });
           this.on('removedfile', function(file) {
             var input = document.querySelector('input[name="image"]');
             if (input) { input.value = ''; }
           });
         }
       });
     }
   }
 });
</script>