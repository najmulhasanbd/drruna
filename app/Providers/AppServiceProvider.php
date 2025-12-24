<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
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
       View::share('services', Service::latest()->get());
       Paginator::useBootstrap();
    }
}
