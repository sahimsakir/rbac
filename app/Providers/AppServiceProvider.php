<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Product; // Import your Product model
use Carbon\Carbon;

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
        //
        Paginator::useBootstrap();

        view()->composer('layouts.app', function ($view) {
            $startDate = Carbon::now()->subDays(10);
            $productCountLast10Days = Product::where('created_at', '>=', $startDate)->count();
            $view->with('productCountLast10Days', $productCountLast10Days);
        });
    }
}
