<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
    Route::resource('users', \App\Http\Controllers\UserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);

    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/update/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/destroy/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');

    // Product listing by category (model binding)
    Route::get('/products/{category}', [ProductController::class, 'index'])->name('admin.products.index');
    // Product detail page (use singular path to avoid conflict with listing route)
    Route::get('/product/{id}', [ProductController::class, 'detail'])->name('admin.products.detail');

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

