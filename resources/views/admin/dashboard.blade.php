@extends('Layout.Header')

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-5">
                    <h2 class="title">Admin Dashboard</h2>
                    <p>Welcome to the admin control panel</p>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-5">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-users fa-3x text-primary"></i>
                        </div>
                        <h3 class="card-title">{{ $totalUsers }}</h3>
                        <p class="card-text text-muted">Total Users</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-box fa-3x text-success"></i>
                        </div>
                        <h3 class="card-title">{{ $totalProducts }}</h3>
                        <p class="card-text text-muted">Total Products</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-tags fa-3x text-warning"></i>
                        </div>
                        <h3 class="card-title">{{ $totalCategories }}</h3>
                        <p class="card-text text-muted">Total Categories</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-shopping-cart fa-3x text-info"></i>
                        </div>
                        <h3 class="card-title">{{ $totalOrders }}</h3>
                        <p class="card-text text-muted">Total Orders</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('products.index') }}" class="btn btn-outline-primary btn-block">
                                    <i class="fas fa-box me-2"></i>Manage Products
                                </a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('categories.index') }}" class="btn btn-outline-success btn-block">
                                    <i class="fas fa-tags me-2"></i>Manage Categories
                                </a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('users.index') }}" class="btn btn-outline-warning btn-block">
                                    <i class="fas fa-users me-2"></i>Manage Users
                                </a>
                            </div>
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('orders.index') }}" class="btn btn-outline-info btn-block">
                                    <i class="fas fa-shopping-cart me-2"></i>Manage Orders
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders and Low Stock -->
        <div class="row">
            <!-- Recent Orders -->
            <div class="col-lg-8 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Recent Orders</h5>
                    </div>
                    <div class="card-body">
                        @if($recentOrders->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentOrders as $order)
                                        <tr>
                                            <td>#{{ $order->id }}</td>
                                            <td>{{ $order->user->name ?? 'Guest' }}</td>
                                            <td>${{ number_format($order->total_amount, 2) }}</td>
                                            <td>
                                                <span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'pending' ? 'warning' : 'secondary') }}">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted text-center">No recent orders found.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Low Stock Products -->
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">Low Stock Alert</h5>
                    </div>
                    <div class="card-body">
                        @if($lowStockProducts->count() > 0)
                            @foreach($lowStockProducts as $product)
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h6 class="mb-1">{{ Str::limit($product->name, 20) }}</h6>
                                    <small class="text-muted">Stock: {{ $product->stock ?? 0 }}</small>
                                </div>
                                <span class="badge bg-danger">Low</span>
                            </div>
                            @endforeach
                        @else
                            <p class="text-muted text-center">All products are well stocked!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    transition: transform 0.2s;
}
.card:hover {
    transform: translateY(-2px);
}
.btn-block {
    width: 100%;
}
.bg-primary { background-color: #007bff !important; }
.bg-success { background-color: #28a745 !important; }
.bg-warning { background-color: #ffc107 !important; }
.bg-info { background-color: #17a2b8 !important; }
.bg-danger { background-color: #dc3545 !important; }
.text-primary { color: #007bff !important; }
.text-success { color: #28a745 !important; }
.text-warning { color: #ffc107 !important; }
.text-info { color: #17a2b8 !important; }
.shadow-sm { box-shadow: 0 .125rem .25rem rgba(0,0,0,.075) !important; }
</style>
@endsection