@extends('Layout.Header')

@section('content')
<div id="user-dashboard">
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                        <h2 class="breadcrumb-title">Dashboard Pengguna</h2>
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
                        <table class="table align-middle mb-0 orders-table">
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
                            <img src="{{ asset('storage/' . ltrim($it->product?->image, '/')) }}" alt="{{ $it->product?->name }}" style="width:40px;height:40px;object-fit:cover;border-radius:4px;">
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
/* Dashboard scoped styles */
#user-dashboard {
  --dash-accent: var(--bs-primary);
  --dash-accent-rgb: var(--bs-primary-rgb);
  --dash-muted: var(--bs-secondary-color);
  --dash-surface: var(--bs-body-bg);
}
#user-dashboard .breadcrumb-area {
  background: linear-gradient(135deg, rgba(var(--bs-primary-rgb), .08), rgba(var(--bs-primary-rgb), .02));
  padding: 24px 0;
}
#user-dashboard .breadcrumb-list .breadcrumb-item a { color: var(--bs-secondary-color); }

#user-dashboard .card {
  border: none;
  border-radius: 16px;
  background: var(--bs-body-bg);
  box-shadow: 0 8px 24px rgba(0,0,0,.06);
  transition: transform .2s ease, box-shadow .2s ease;
}
#user-dashboard .btn-outline-primary { border-color: var(--bs-primary); color: var(--bs-primary); }
#user-dashboard .btn-outline-primary:hover { background: var(--bs-primary); color: #fff; }
#user-dashboard .profile-info .fw-semibold { color: var(--bs-emphasis-color); }
#user-dashboard .table thead th { font-weight: 600; background: rgba(var(--bs-primary-rgb), .08); border-bottom: 1px solid rgba(0,0,0,.06); }
#user-dashboard .table tbody tr:hover { background-color: rgba(var(--bs-primary-rgb), .04); }
.copy-toast { position: fixed; top: 16px; right: 16px; background: var(--bs-primary); color: #fff; padding: .5rem .75rem; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,.25); opacity: 0; transform: translateY(-6px); transition: opacity .2s ease, transform .2s ease; z-index: 1056; }
#user-dashboard .card:hover { transform: translateY(-3px); box-shadow: 0 12px 28px rgba(0,0,0,.08); }
#user-dashboard .card .btn { border-radius: 10px; }
#user-dashboard .btn-outline-primary { border-color: var(--dash-accent); color: var(--dash-accent); }
#user-dashboard .btn-outline-primary:hover { background: var(--dash-accent); color: #fff; }

#user-dashboard .profile-info p { margin-bottom: .35rem; }
#user-dashboard .profile-info .fw-semibold { color: #111827; }

#user-dashboard .table thead th { font-weight: 600; background: rgba(99,102,241,.08); border-bottom: 1px solid rgba(0,0,0,.06); }
#user-dashboard .table tbody tr { transition: background-color .2s ease; }
#user-dashboard .table tbody tr:hover { background-color: rgba(99,102,241,.04); }
#user-dashboard .table td, #user-dashboard .table th { vertical-align: middle; }

#user-dashboard .badge { font-weight: 600; border-radius: 999px; padding: .35rem .6rem; }

/* Modal polish */
#user-dashboard .modal-content { border: none; border-radius: 16px; box-shadow: 0 16px 48px rgba(0,0,0,.14); }
@keyframes modalZoomIn { from { transform: scale(.96); opacity: .0; } to { transform: scale(1); opacity: 1; } }
#user-dashboard .modal.fade.show .modal-dialog { animation: modalZoomIn .18s ease-out; }
@media (prefers-reduced-motion: reduce) { #user-dashboard .modal.fade.show .modal-dialog { animation: none; } }

/* Copy toast */
.copy-toast { position: fixed; top: 16px; right: 16px; background: var(--dash-accent); color: #fff; padding: .5rem .75rem; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,.25); opacity: 0; transform: translateY(-6px); transition: opacity .2s ease, transform .2s ease; z-index: 1056; }
.copy-toast.show { opacity: 1; transform: translateY(0); }

/* Responsive tweaks */
@media (max-width: 576px) {
  #user-dashboard .breadcrumb-area { padding: 16px 0; }
  #user-dashboard .card { border-radius: 14px; }
}
</style>

<script>
(function(){
  var root = document.getElementById('user-dashboard');
  if (!root) return;

  // Match card heights across the two columns for neat layout
  function matchHeights(){
    var cards = root.querySelectorAll('.row.g-4 > [class*="col-"] .card');
    var max = 0;
    cards.forEach(function(c){ c.style.minHeight = ''; max = Math.max(max, c.offsetHeight); });
    cards.forEach(function(c){ c.style.minHeight = max + 'px'; });
  }
  window.addEventListener('load', matchHeights);
  window.addEventListener('resize', matchHeights);

  // Copy order id on click for quick sharing
  function showToast(text){
    var toast = document.createElement('div');
    toast.className = 'copy-toast';
    toast.textContent = text;
    document.body.appendChild(toast);
    requestAnimationFrame(function(){ toast.classList.add('show'); });
    setTimeout(function(){ toast.classList.remove('show'); }, 1800);
    setTimeout(function(){ toast.remove(); }, 2300);
  }
  root.querySelectorAll('.orders-table tbody tr td:first-child').forEach(function(td){
    td.classList.add('order-id-cell');
    td.addEventListener('click', function(){
      var id = td.textContent.trim();
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(id).then(function(){ showToast('Order #' + id + ' disalin'); }).catch(function(){ showToast('Gagal menyalin'); });
      } else {
        // Fallback
        var ta = document.createElement('textarea'); ta.value = id; document.body.appendChild(ta); ta.select(); try { document.execCommand('copy'); showToast('Order #' + id + ' disalin'); } catch(e){ showToast('Gagal menyalin'); } document.body.removeChild(ta);
      }
    });
  });
})();
</script>
</div>
@endsection