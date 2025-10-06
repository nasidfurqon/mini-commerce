<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Helpers\AuthHelper;

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
        // Share AuthHelper with all views
        View::share('authHelper', new AuthHelper());
        
        // Share common auth data with all views
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
    }
}
