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
        
        // Override asset helper to handle non-public-folder setup
        if (app()->environment('production')) {
            app()->singleton('url', function ($app) {
                $url = new \Illuminate\Routing\UrlGenerator(
                    $app['router']->getRoutes(),
                    $app['request']
                );
                
                $url->forceScheme('https');
                
                // Override asset method
                $originalAsset = $url;
                $url = new class($originalAsset) extends \Illuminate\Routing\UrlGenerator {
                    protected $original;
                    
                    public function __construct($original) {
                        $this->original = $original;
                        parent::__construct($original->routes, $original->request);
                    }
                    
                    public function asset($path, $secure = null) {
                        // For production, always prefix with /public/ for actual assets
                        if (str_contains($path, 'build/') || 
                            str_contains($path, 'images/') || 
                            str_contains($path, 'favicon.ico') ||
                            str_contains($path, 'robots.txt')) {
                            return $this->to('public/' . ltrim($path, '/'), [], $secure);
                        }
                        
                        return parent::asset($path, $secure);
                    }
                };
                
                return $url;
            });
        }
    }
}
