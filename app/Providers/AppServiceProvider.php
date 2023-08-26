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
        $namedomain = Tenants::getdomain();
        $setting = Cache::get($namedomain.'_settings',[]);
        Config::set('broadcasting.connections.pusher.key',  $setting->pusher_app_key??'');
        Config::set('broadcasting.connections.pusher.secret',  $setting->pusher_app_SECRET??'');
        Config::set('broadcasting.connections.pusher.app_id',  $setting->pusher_app_id??'');


        View::share('Cu' ,'ج.م');

        if (env('tenant') != false) {
            // $host  = $request->getHost();
            // $tenant = Tenant::where('domin', $host)->first();
            // if ($tenant == null ||  $tenant->database == null) {
            //     abort(404);
            // };

            // DB::getDefaultConnection() ;

        }
            // $general_setting = DB::table('general_settings')->latest()->first();
            //...

        // if(DB::getDefaultConnection() == 'tenant'){

        // }
        // Schema::defaultStringLength(191);
    }
}
