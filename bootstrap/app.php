<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use App\Http\Middleware\GuestOrAuthMiddleware; 
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\MinimumRoleMiddleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            VerifyCsrfToken::class,
        ]);
        
        $middleware->alias([
            'role' => RoleMiddleware::class,
            'guest.or.auth' => GuestOrAuthMiddleware::class,
            'min.role' => MinimumRoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (NotFoundHttpException $e, $request) {
            return response()->view('Page.Error.404', [], 404);
        });
        $exceptions->render(function (MethodNotAllowedHttpException $e, $request) {
            return response()->view('Page.Error.405', [], 405);
        });
    })->create();
