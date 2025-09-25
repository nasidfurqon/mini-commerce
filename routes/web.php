<?php

use Illuminate\Support\Facades\Route;

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