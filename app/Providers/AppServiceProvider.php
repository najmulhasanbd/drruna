<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use App\Models\Service;
use App\Models\Specialist;
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
        \Illuminate\Pagination\Paginator::useBootstrapFive();

        $settings = \Illuminate\Support\Facades\Cache::rememberForever('site_settings', function () {

            return \App\Models\Setting::first();
        });
        \Illuminate\Support\Facades\View::share('setting', $settings);

        $services = \Illuminate\Support\Facades\Cache::rememberForever('global_services', function () {
            return \App\Models\Service::latest()->get();
        });
        \Illuminate\Support\Facades\View::share('services', $services);

        $specialist = \Illuminate\Support\Facades\Cache::rememberForever('global_specialists', function () {
            return \App\Models\Specialist::latest()->get();
        });
        \Illuminate\Support\Facades\View::share('specialist', $specialist);
    }
}
