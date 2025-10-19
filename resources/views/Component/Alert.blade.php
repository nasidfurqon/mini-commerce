@php
    $hasAny = session()->has('success')
        || session()->has('error')
        || session()->has('danger')
        || session()->has('warning')
        || session()->has('info')
        || session()->has('status')
        || ($errors ?? collect())->any();
@endphp

@if($hasAny)
<div class="alert-stack">
    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-icon alert-dismissible fade show alert-floating" role="alert" data-auto-dismiss="5000">
            <div class="d-flex align-items-center">
                <div class="avatar-sm rounded bg-success d-flex align-items-center justify-content-center me-2">
                    <i class="bx bx-check-shield text-white fs-17"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="mb-0">Berhasil</h6>
                    <p class="mb-0">{{ session('success') }}</p>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- ERROR / DANGER --}}
    @if(session('error') || session('danger'))
        <div class="alert alert-danger alert-icon alert-dismissible fade show alert-floating" role="alert" data-auto-dismiss="7000">
            <div class="d-flex align-items-center">
                <div class="avatar-sm rounded bg-danger d-flex align-items-center justify-content-center me-2">
                    <i class="bx bx-x-circle text-white fs-17"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="mb-0">Terjadi Kesalahan</h6>
                    <p class="mb-0">{{ session('error') ?? session('danger') }}</p>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- WARNING --}}
    @if(session('warning'))
        <div class="alert alert-warning alert-icon alert-dismissible fade show alert-floating" role="alert" data-auto-dismiss="7000">
            <div class="d-flex align-items-center">
                <div class="avatar-sm rounded bg-warning d-flex align-items-center justify-content-center me-2">
                    <i class="bx bx-error-alt text-dark fs-17"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="mb-0">Peringatan</h6>
                    <p class="mb-0">{{ session('warning') }}</p>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- INFO / STATUS --}}
    @if(session('info') || session('status'))
        <div class="alert alert-info alert-icon alert-dismissible fade show alert-floating" role="alert" data-auto-dismiss="6000">
            <div class="d-flex align-items-center">
                <div class="avatar-sm rounded bg-info d-flex align-items-center justify-content-center me-2">
                    <i class="bx bx-info-circle text-white fs-17"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="mb-0">Info</h6>
                    <p class="mb-0">{{ session('info') ?? session('status') }}</p>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- VALIDATION ERRORS --}}
    @if(($errors ?? collect())->any())
        <div class="alert alert-danger alert-icon alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <div class="avatar-sm rounded bg-danger d-flex align-items-center justify-content-center me-2">
                    <i class="bx bx-error text-white fs-17"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="mb-0">Validasi Gagal</h6>
                    <ul class="mb-0 ps-3">
                        @foreach(($errors->all() ?? []) as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Auto dismiss: sembunyikan alert setelah durasi jika diset --}}
    <script>
        (function() {
            const alerts = document.querySelectorAll('.alert[data-auto-dismiss]');
            alerts.forEach(function(el) {
                const delay = parseInt(el.getAttribute('data-auto-dismiss'), 10);
                if (!isNaN(delay)) {
                    setTimeout(function() {
                        try {
                            // Gunakan kelas Bootstrap fade untuk animasi penutupan
                            el.classList.remove('show');
                            el.addEventListener('transitionend', function() {
                                el.remove();
                            }, { once: true });
                            // Jika fade tidak tersedia, fallback: remove langsung
                            setTimeout(function(){ if (document.body.contains(el)) el.remove(); }, 600);
                        } catch (e) { if (document.body.contains(el)) el.remove(); }
                    }, delay);
                }
            });
        })();
    </script>
</div>

<script>
// ... existing code ...
</script>

<style>
.alert-stack { position: fixed; top: 16px; right: 16px; z-index: 1080; width: min(420px, calc(100vw - 32px)); pointer-events: none; }
.alert-floating { pointer-events: auto; margin-bottom: 12px; box-shadow: 0 10px 20px rgba(16, 24, 40, .12), 0 2px 6px rgba(16, 24, 40, .08); border-radius: 12px; }
.alert-floating .btn-close { filter: none; }
@media (max-width: 576px) { .alert-stack { top: 12px; right: 12px; width: min(360px, calc(100vw - 24px)); } }
</style>
@endif