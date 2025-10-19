@extends('Layout.Admin')

@section('content')
<div class="container-xxl">
  <div class="row">
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="w-100">
      @csrf
      @method('PUT')

      <div class="card mb-3">
        <div class="card-header">
          <h4 class="card-title">Edit Product</h4>
        </div>
        <div class="card-body">
          <div class="row g-3">
            <div class="col-lg-4">
              <label for="name" class="form-label">Product Name</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Items Name" value="{{ old('name', $product->name) }}">
            </div>

            <div class="col-lg-4">
              <label for="product-categories" class="form-label">Product Categories</label>
              @php
                $selectedCategoryId = request('category') ?: old('category_id', $product->category_id);
                $mutedCategory = request()->has('category');
              @endphp
              <select class="form-control" id="product-categories" name="category_id" data-choices data-placeholder="Select Categories" {{ $mutedCategory ? 'disabled' : '' }}>
                <option value="">Choose a categories</option>
                @foreach($categories as $cat)
                  <option value="{{ $cat->id }}" {{ $selectedCategoryId == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
              </select>
              @if($mutedCategory)
                <input type="hidden" name="category_id" value="{{ $selectedCategoryId }}">
                <small class="text-muted">Kategori telah dipilih dari halaman sebelumnya.</small>
              @endif
            </div>

            <div class="col-lg-2">
              <label for="stock" class="form-label">Stock</label>
              <input type="number" id="stock" name="stock" class="form-control" placeholder="Items Stock" value="{{ old('stock', $product->stock) }}">
            </div>

            <div class="col-lg-2">
              <label for="is_active" class="form-label">Is Active</label>
              <select class="form-control" id="is_active" name="is_active">
                <option value="1" {{ old('is_active', $product->is_active) == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('is_active', $product->is_active) == 0 ? 'selected' : '' }}>No</option>
              </select>
            </div>            
          </div>

          <div class="row g-3 mt-1">
            <div class="col-lg-3 col-md-6">
              <label for="weight" class="form-label">Weight</label>
              <input type="text" id="weight" name="weight" class="form-control" placeholder="In grams" value="{{ old('weight', $product->weight) }}">
            </div>
            <div class="col-lg-3 col-md-6">
              <label for="dimension" class="form-label">Dimension</label>
              <input type="text" id="dimension" name="dimension" class="form-control" placeholder="ex: 10x10x10" value="{{ old('dimension', $product->dimension) }}">
            </div>
            <div class="col-lg-3 col-md-6">
              <label for="material" class="form-label">Materials</label>
              <input type="text" id="material" name="material" class="form-control" placeholder="ex: cotton, polyester" value="{{ old('material', $product->material) }}">
            </div>
            <div class="col-lg-3 col-md-6">
              <label for="product-price" class="form-label">Price</label>
              <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" id="product-price" name="price" class="form-control" value="{{ old('price', $product->price) }}">
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-12">
              <label for="description" class="form-label">Description</label>
              <textarea id="description" name="description" class="form-control bg-light-subtle" rows="7" placeholder="Short description about the product">{{ old('description', $product->description) }}</textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="card h-100 mb-3">
            <div class="card-header"><h4 class="card-title">Product Photo</h4></div>
            <div class="card-body">
              <div class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-max-files="1" data-upload-multiple="false" data-parallel-uploads="1">
                <div class="fallback">
                  <input name="file" type="file" accept="image
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

<script>
 document.addEventListener('DOMContentLoaded', function () {
   var chk = document.getElementById('is_active');
   var statusEl = document.getElementById('is_active_status');
   if (chk && statusEl) {
     statusEl.textContent = chk.checked ? 'Active' : 'Inactive';
     chk.addEventListener('change', function () {
       statusEl.textContent = chk.checked ? 'Active' : 'Inactive';
     });
   }
 });
</script>

