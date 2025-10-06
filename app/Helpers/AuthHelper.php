<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class AuthHelper
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
     * Check if user is guest (not authenticated)
     */
    public static function isGuest(): bool
    {
        return !Auth::check();
    }

    /**
     * Check if user is authenticated
     */
    public static function isAuthenticated(): bool
    {
        return Auth::check();
    }

    /**
     * Check if user has specific role
     */
    public static function hasRole(string $role): bool
    {
        if (!Auth::check()) {
            return $role === 'guest';
        }

        return Auth::user()->role === $role;
    }

    /**
     * Check if user has minimum role level
     */
    public static function hasMinimumRole(string $minimumRole): bool
    {
        $userRole = Auth::check() ? Auth::user()->role : 'guest';
        
        $userLevel = self::ROLE_LEVELS[$userRole] ?? 0;
        $requiredLevel = self::ROLE_LEVELS[$minimumRole] ?? 0;

        return $userLevel >= $requiredLevel;
    }

    /**
     * Get current user role
     */
    public static function getCurrentRole(): string
    {
        return Auth::check() ? Auth::user()->role : 'guest';
    }

    /**
     * Check if user can access cart
     */
    public static function canAccessCart(): bool
    {
        return self::hasMinimumRole('pengguna');
    }

    /**
     * Check if user can access admin panel
     */
    public static function canAccessAdmin(): bool
    {
        return self::hasRole('admin');
    }

    /**
     * Check if user can access user features (profile, orders, etc.)
     */
    public static function canAccessUserFeatures(): bool
    {
        return self::hasMinimumRole('pengguna');
    }

    /**
     * Get user display name
     */
    public static function getUserDisplayName(): string
    {
        if (!Auth::check()) {
            return 'Guest';
        }

        return Auth::user()->name ?? Auth::user()->email;
    }

    /**
     * Get appropriate dashboard route based on user role
     */
    public static function getDashboardRoute(): string
    {
        if (self::hasRole('admin')) {
            return route('admin.dashboard');
        }
        
        if (self::hasRole('pengguna')) {
            return route('user.index');
        }

        return route('index');
    }
}