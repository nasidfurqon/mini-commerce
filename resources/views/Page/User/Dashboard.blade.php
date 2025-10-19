@extends('Layout.Header')

@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                        <h2 class="breadcrumb-title">Dashboard Pengguna</h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <ul class="breadcrumb-list text-center text-md-end">
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section pt-60px pb-60px" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <div class="row g-4">
            <!-- Profil User -->
            <div class="col-lg-4 col-md-12">
                <div class="card p-3 h-100">
                    <div class="d-flex align-items-start justify-content-between mb-2">
                        <h4 class="mb-0">Profil Saya</h4>
                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profil</button>
                    </div>
                    <div class="profile-info">
                        <p class="mb-1 text-muted">Nama</p>
                        <p class="fw-semibold">{{ $user?->name }}</p>
                        <p class="mb-1 text-muted">Email</p>
                        <p class="fw-semibold">{{ $user?->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Daftar Orders -->
            <div class="col-lg-8 col-md-12">
                <div class="card p-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h4 class="mb-0">Pesanan Saya</h4>
                    </div>
                    @if(empty($orders) || $orders->isEmpty())
                        <p class="p-3 mb-0">Belum ada pesanan.</p>
                    @else
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>#Order</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    <td>Rp{{ number_format($order->total, 2, ',', '.') }}</td>
                                    <td>
                                        @php $st = $order->status; @endphp
                                        <span class="badge {{ $st === 'diproses' ? 'bg-warning' : ($st === 'dikirim' ? 'bg-info' : ($st === 'selesai' ? 'bg-success' : 'bg-danger')) }}">{{ ucfirst($st) }}</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#orderDetailModal{{ $order->id }}">Lihat</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Profil -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('user.profile.update') }}">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user?->name) }}" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user?->email) }}" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modals Detail Order -->
@foreach(($orders ?? []) as $order)
<div class="modal fade" id="orderDetailModal{{ $order->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Order #{{ $order->id }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <p class="mb-1"><span class="text-muted">Tanggal:</span> <span class="fw-semibold">{{ $order->created_at->format('d/m/Y H:i') }}</span></p>
            <p class="mb-1"><span class="text-muted">Alamat:</span> <span class="fw-semibold">{{ $order->adress_text }}</span></p>
            <p class="mb-1"><span class="text-muted">Status:</span> <span class="fw-semibold">{{ ucfirst($order->status) }}</span></p>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $it)
                    <tr>
                        <td class="d-flex align-items-center gap-2">
                            <img src="{{ $it->product?->image_url }}" alt="{{ $it->product?->name }}" style="width:40px;height:40px;object-fit:cover;border-radius:4px;">
                            <span>{{ $it->product?->name }}</span>
                        </td>
                        <td>{{ $it->qty }}</td>
                        <td>Rp{{ number_format($it->price, 2, ',', '.') }}</td>
                        <td>Rp{{ number_format($it->subtotal, 2, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-end mt-3">
            <h5 class="mb-0">Total: <span class="theme-color">Rp{{ number_format($order->total, 2, ',', '.') }}</span></h5>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
@endforeach

<style>
/* Scoped styles untuk kerapian dashboard */
.profile-info p { margin-bottom: .25rem; }
.table thead th { font-weight: 600; }
.badge { font-weight: 500; }
</style>
@endsection