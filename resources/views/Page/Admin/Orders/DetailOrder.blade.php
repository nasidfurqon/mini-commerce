@extends('Layout.Admin')

@section('content')
<div class="container-xxl">
  <div class="row mb-3">
    <div class="col-lg-8">
      <div class="card h-100">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title mb-0">Order Detail #{{ $order->id }}</h4>
          <div>
            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-soft-primary btn-sm">Edit</a>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
          </div>
        </div>
        <div class="card-body">
          <div class="row g-3">
            <div class="col-md-6">
              <div class="d-flex align-items-center gap-2">
                <span class="text-muted">Customer</span>
                <span class="fw-medium">{{ optional($order->user)->name ?? '-' }}</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-center gap-2">
                <span class="text-muted">Order Date</span>
                <span class="fw-medium">{{ $order->created_at?->format('d M, Y H:i') }}</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-center gap-2">
                <span class="text-muted">Total</span>
                <span class="fw-medium">Rp {{ number_format((float)$order->total,2,',','.') }}</span>
              </div>
            </div>
            <div class="col-md-6">
              @php
                $statusColors = [
                  'diproses' => 'bg-warning-subtle text-warning',
                  'dikirim' => 'bg-info-subtle text-info',
                  'selesai' => 'bg-success-subtle text-success',
                  'batal' => 'bg-danger-subtle text-danger',
                ];
                $badgeClass = $statusColors[$order->status] ?? 'bg-secondary-subtle text-secondary';
              @endphp
              <div class="d-flex align-items-center gap-2">
                <span class="text-muted">Status</span>
                <span class="badge {{ $badgeClass }} py-1 px-2">{{ ucfirst($order->status) }}</span>
              </div>
            </div>
            <div class="col-12">
              <label class="text-muted mb-1">Address</label>
              <div class="p-2 bg-light-subtle rounded">{{ $order->adress_text ?: '-' }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card h-100">
        <div class="card-header">
          <h4 class="card-title mb-0">Summary</h4>
        </div>
        <div class="card-body">
          <ul class="list-unstyled mb-0 small">
            <li class="d-flex justify-content-between"><span>Items</span><span>{{ $order->orderItems->sum('qty') }}</span></li>
            <li class="d-flex justify-content-between"><span>Total</span><span class="fw-bold">Rp {{ number_format((float)$order->orderItems->sum('subtotal'),0,',','.') }}</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h4 class="card-title mb-0">Order Items</h4>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table align-middle mb-0 table-hover table-centered">
              <thead class="bg-light-subtle">
                <tr>
                  <th>#</th>
                  <th>Product</th>
                  <th class="text-center">Qty</th>
                  <th class="text-end">Price</th>
                  <th class="text-end">Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @forelse($order->orderItems as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ optional($item->product)->name ?? '-' }}</td>
                    <td class="text-center">{{ $item->qty }}</td>
                    <td class="text-end">Rp {{ number_format((float)$item->price,2,',','.') }}</td>
                    <td class="text-end">Rp {{ number_format((float)$item->subtotal,2,',','.') }}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" class="text-center text-muted">No items</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


<link rel="stylesheet" href="{{ asset('assets/css2/order-detail.css') }}">
<script src="{{ asset('assets/js2/order-detail.js') }}"></script>