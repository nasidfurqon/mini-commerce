<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get dashboard statistics
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalOrders = Order::count();
        
        // Get recent orders
        $recentOrders = Order::with(['user'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Get low stock products (assuming stock field exists)
        $lowStockProducts = Product::where('stock', '<', 10)
            ->where('is_active', true)
            ->limit(5)
            ->get();
        
        return view('admin.dashboard', compact(
            'totalUsers',
            'totalProducts', 
            'totalCategories',
            'totalOrders',
            'recentOrders',
            'lowStockProducts'
        ));
    }
}