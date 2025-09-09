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
        // Force HTTPS and proper URLs in production
        if (config('app.env') === 'production') {
            \URL::forceScheme('https');
            \URL::forceRootUrl(config('app.url'));

            // Set asset URL to ensure proper file access
            if (!app()->runningInConsole()) {
                // Pastikan storage files bisa diakses
                config(['app.asset_url' => config('app.url')]);
            }
        }
    }
}
