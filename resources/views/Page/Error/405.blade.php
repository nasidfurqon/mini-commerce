@extends('Layout.Header')

@section('content')

    <div class="blank-page-area pb-100px pt-100px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blank-content-header">
                        <h1>Akses Ditolak</h1>
                    </div>
                    <div class="page-not-found text-center">
                        <h4>Untuk login, silakan gunakan halaman login dan kirimkan form.</h4>
                        <div class="error-actions">
                            <a class="btn btn-primary" href="{{ route('auth.page') }}">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<style>
    .error-actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 12px;
        margin-top: 16px;
    }
    .error-actions .btn { min-width: 160px; display: inline-flex; align-items: center; justify-content: center; text-align: center; }
    .error-actions .btn:hover { color: #fff !important; }
</style>
@endsection