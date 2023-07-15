<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\setting;
use Illuminate\Support\Facades\Schema;
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

        View::share('setting',setting::first());
        View::share('categorys',Category::active(1)->get());
        // Schema::defaultStringLength(191);
    }
}
