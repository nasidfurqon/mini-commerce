<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;

// Public routes (accessible by everyone including guests)
Route::middleware(['guest.or.auth'])->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('index');
    Route::get('/shop/{category?}', [LandingPageController::class, 'shop'])->name('shop');
    Route::get('/contact', [LandingPageController::class, 'contact'])->name('contact');
    Route::get('/product/{id}', [LandingPageController::class, 'detail'])->name('product.detail');
});

// Authentication routes (accessible by guests only)
Route::middleware(['guest'])->group(function () {
    Route::get('/auth-control', [AuthController::class, 'index'])->name('auth.page');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

// Logout route (authenticated users only)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin routes (admin role required)
Route::prefix('admin')->middleware(['auth','role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Admin resource routes
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('orders', \App\Http\Controllers\OrderController::class);
    Route::resource('order-items', \App\Http\Controllers\OrderItemController::class);
    Route::resource('carts', \App\Http\Controllers\CartController::class);
    Route::resource('cart-items', \App\Http\Controllers\CartItemController::class);
    Route::resource('wishlists', \App\Http\Controllers\WishlistController::class);
    Route::resource('wishlist-items', \App\Http\Controllers\WishlistItemController::class);
});

// User routes (minimum pengguna role required)
Route::prefix('user')->middleware(['min.role:pengguna'])->group(function () {
    Route::get('/home', [LandingPageController::class, 'index'])->name('user.index');
    Route::get('/shop/{category?}', [LandingPageController::class, 'shop'])->name('user.shop');
    Route::get('/contact', [LandingPageController::class, 'contact'])->name('user.contact');
    Route::get('/product/{id}', [LandingPageController::class, 'detail'])->name('user.product.detail');
    Route::get('/cart', [CartController::class, 'index'])->name('user.cart.index');
    Route::post('/cart/add', [CartController::class, 'store'])->name('user.cart.add');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('user.cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('user.cart.remove');
    Route::get('/checkout', [LandingPageController::class, 'checkout'])->name('user.checkout.index');
});

// Additional user-only routes that require authentication
Route::middleware(['min.role:pengguna'])->group(function () {
    Route::get('/profile', function () {
        return view('user.profile');
    })->name('user.profile');
    
    Route::get('/orders', function () {
        return view('user.orders');
    })->name('user.orders');
    
    Route::get('/wishlist', [LandingPageController::class, 'wishlist'])->name('wishlist.index');
});

