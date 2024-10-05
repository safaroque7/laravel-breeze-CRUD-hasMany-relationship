<?php

namespace App\Providers;

use App\Models\Client;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $totalClient = Client::count(); // Count total clients
            $view->with(
                'totalClient', $totalClient
            ); // Share it with all views
        });
    }
}
