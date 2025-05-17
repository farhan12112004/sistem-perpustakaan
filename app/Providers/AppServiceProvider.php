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
       if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && 
        strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false) {
        \URL::forceScheme('https');
    }
    }
}