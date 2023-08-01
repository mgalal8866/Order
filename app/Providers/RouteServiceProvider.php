<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $apiNamespace ='App\Http\Controllers\Api';
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */

    public const HOME = '/';
    public const DASHBOARD = '/admin/dashborad';
    public const FRONT = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('tenant', 'api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware(['tenant', 'api', 'ApiVersion:v1','ApiCheckKey'])
                ->prefix('api/v1')
                ->namespace("{$this->apiNamespace}\V1")
                ->group(base_path('routes/api_v1.php'));


            Route::middleware(['tenant', 'web'])
                ->group(base_path('routes/web.php'));

            Route::middleware(['web'])
                ->group(base_path('routes/main.php'));
        });
    }
}
