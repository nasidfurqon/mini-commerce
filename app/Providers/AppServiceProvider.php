<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Helpers\AuthHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share AuthHelper dengan semua view
        View::share('authHelper', new AuthHelper());
        
        // Share data umum auth ke semua view
        View::composer('*', function ($view) {
            $view->with([
                'isGuest' => AuthHelper::isGuest(),
                'isAuthenticated' => AuthHelper::isAuthenticated(),
                'currentRole' => AuthHelper::getCurrentRole(),
                'canAccessCart' => AuthHelper::canAccessCart(),
                'canAccessAdmin' => AuthHelper::canAccessAdmin(),
                'canAccessUserFeatures' => AuthHelper::canAccessUserFeatures(),
                'userDisplayName' => AuthHelper::getUserDisplayName(),
            ]);
        });

        View::composer('Layout.Header', function ($view) {
            $cartCount = 0;
            if(Auth::check()){
                $cart = DB::table('carts')->where('user_id', Auth::id())->first();
                if($cart){
                    $cartCount = DB::table('cart_items')->where('cart_id', $cart->id)->sum('qty');
                }
            }
            $view->with('cartCount', $cartCount);
        });

        View::composer('Partial.Cart-Preview', function ($view) {
            $cart = null;
            if (Auth::check()) {
                $cart = DB::table('carts')->where('user_id', Auth::id())->first();
            }
            if (!$cart) {
                $cart = DB::table('carts')->first();
            }

            $items = collect();
            if ($cart) {
                $items = DB::table('cart_items')
                    ->where('cart_items.cart_id', $cart->id)
                    ->join('products', 'cart_items.product_id', '=', 'products.id')
                    ->select('cart_items.id as cart_item_id','products.id','products.name','products.image','products.price','cart_items.qty')
                    ->get();

            }

            $subTotal = $items->reduce(function ($carry, $item) {
                return $carry + ($item->price * $item->qty);
            }, 0);

            $view->with([
                'items' => $items,
                'subTotal' => $subTotal,
            ]);
        });
    }
}
