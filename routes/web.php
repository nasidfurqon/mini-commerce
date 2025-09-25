<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
Route::get('/', [LandingPageController::class, 'index'])->name('landing-page.index');

Route::get('/example', function () {
    return view('example-page');
})->name('example');

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\{
    CartController,
    CartItemController,
    CategoryController,
    OrderController,
    OrderItemController,
    ProductController,
    ProductRatingController,
    UserController,
    WishlistController,
    WishlistItemController
};

Route::resources([
    'carts'          => CartController::class,
    'cart-items'     => CartItemController::class,
    'categories'     => CategoryController::class,
    'orders'         => OrderController::class,
    'order-items'    => OrderItemController::class,
    'products'       => ProductController::class,
    'product-ratings'=> ProductRatingController::class,
    'users'          => UserController::class,
    'wishlists'      => WishlistController::class,
    'wishlist-items' => WishlistItemController::class,
]);
