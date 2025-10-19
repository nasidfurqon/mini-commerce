@extends('Layout.Admin')

@section('content')
<div class="container-xxl">
  <div class="row">
    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="w-100">
      @csrf
      @method('PUT')

      <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title mb-0">Edit Order #{{ $order->id }}</h4>
          <a href="{{ route('admin.orders.detail', $order->id) }}" class="btn btn-outline-secondary btn-sm">View Detail</a>
        </div>
        <div class="card-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Status</label>
              <select name="status" class="form-select">
                @php $status = old('status', $order->status); @endphp
                <option value="diproses" {{ $status==='diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="dikirim" {{ $status==='dikirim' ? 'selected' : '' }}>Dikirim</option>
                <option value="selesai" {{ $status==='selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="batal" {{ $status==='batal' ? 'selected' : '' }}>Batal</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="total" class="form-label">Total</label>
              <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="total" id="total" class="form-control" value="{{ old('total', $order->total) }}" step="1" min="0" placeholder="0">
              </div>
            </div>
          </div>

          <div class="row g-3 mt-1">
            <div class="col-12">
              <label for="adress_text" class="form-label">Alamat</label>
              <textarea name="adress_text" id="adress_text" rows="4" class="form-control" placeholder="Alamat pengiriman">{{ old('adress_text', $order->adress_text) }}</textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="p-3 bg-light rounded">
        <div class="row justify-content-end g-2">
          <div class="col-lg-2">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary w-100">Cancel</a>
          </div>
          <div class="col-lg-2">
            <button type="submit" class="btn btn-primary w-100">Update Order</button>
          </div>
        </div>
      </div>

    </form>
  </div>
</div>
@endsection