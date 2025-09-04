<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Force HTTPS in production
        if (app()->environment('production')) {
            \URL::forceScheme('https');
        }
        
        // Fix asset URLs when Laravel is not in public folder
        if (app()->environment('production')) {
            // Check if we're not in a public subfolder setup
            $appUrl = config('app.url');
            if (!str_contains($appUrl, '/public')) {
                // Override asset URL generation to include /public prefix for assets
                app('url')->asset = function ($path, $secure = null) use ($appUrl) {
                    if (str_starts_with($path, 'build/') || str_starts_with($path, 'images/')) {
                        return rtrim($appUrl, '/') . '/public/' . ltrim($path, '/');
                    }
                    return rtrim($appUrl, '/') . '/' . ltrim($path, '/');
                };
            }
        }
    }
}
