<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Service;
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
            // get all active clients
            $activeClients = Client::where('status', 1)->get();

            //get Facebook Review Left
            $facebookReviewLeftCount = Client::where('facebook_review', 0)->count();

            //get Google Review Left
            $googleReviewLeftCount = Client::where('google_review', 0)->count();


            // for total active clients
            $activeClients = Client::where('status', 1)->count();

            //for total inactive clients
            $inactiveClients = Client::where('status', 0)->count();

            //for total cleints
            $totalClient = Client::count(); // Count total clients

            
            $currentYear = Carbon::now()->format('Y');
            $currentMonth = Carbon::now()->format('F');
            $currentDate = Carbon::now()->format('d');
            $currentDay = Carbon::now()->format('l');

            // for total services
            $allService = Service::count();

            $view->with(
                [
                    'totalClient' => $totalClient,
                    'activeClients' => $activeClients,
                    'inactiveClients' => $inactiveClients,
                    'facebookReviewLeftCount' => $facebookReviewLeftCount,
                    'googleReviewLeftCount' => $googleReviewLeftCount,
                    'currentYear' => $currentYear,
                    'currentMonth' => $currentMonth,
                    'currentDate' => $currentDate,
                    'currentDay' => $currentDay,
                    'allService' => $allService,
                ]
            ); // Share it with all views
            
        });
    }
}
