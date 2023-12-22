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
use Illuminate\Support\Collection;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Collection::macro('pick', function (...$columns) {

            return $this->map(function ($item, $key) use ($columns) {
                $data = [];
                foreach ($columns as $column) {
                    $data[$column] = $item[$column] ?? null;
                }

                return $data;
            });
        });
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
