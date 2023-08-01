<?php

namespace App\Providers;

use App\service\TenantService;
use App\Models\Tenant;
use App\Models\setting;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
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



        if (env('tenant') != false) {
            // $host  = $request->getHost();
            // $tenant = Tenant::where('domin', $host)->first();
            // if ($tenant == null ||  $tenant->database == null) {
            //     abort(404);
            // };

            DB::getDefaultConnection() ;

        }
            // $general_setting = DB::table('general_settings')->latest()->first();
            //...

        // if(DB::getDefaultConnection() == 'tenant'){

        // }
        // Schema::defaultStringLength(191);
    }
}
