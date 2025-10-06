<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MinimumRoleMiddleware
{
    /**
     * Role hierarchy levels
     */
    private const ROLE_LEVELS = [
        'guest' => 0,
        'pengguna' => 1,
        'admin' => 2,
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $minimumRole
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $minimumRole)
    {
        $userRole = Auth::check() ? Auth::user()->role : 'guest';
        
        $userLevel = self::ROLE_LEVELS[$userRole] ?? 0;
        $requiredLevel = self::ROLE_LEVELS[$minimumRole] ?? 0;

        if ($userLevel < $requiredLevel) {
            if (!Auth::check()) {
                return redirect()->route('auth.page')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
            } else {
                return redirect()->route('index')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
            }
        }

        return $next($request);
    }
}