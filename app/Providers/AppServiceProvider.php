<?php

namespace App\Providers;

use App\Models\Tenant;
use App\Facade\Tenants;
use App\Models\setting;
use App\Models\Category;
use App\service\TenantService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\TenantMiddleware;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('Tenants',function(){
            return new TenantService();
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::share('Cu' ,'ج.م');

    }
}
