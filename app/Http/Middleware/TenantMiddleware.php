<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Tenant;
use App\Models\setting;
use App\Models\Category;
use Illuminate\Http\Request;
use App\service\TenantService;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(env('tenant') != false){
            $host  = $request->getHost();
            $tenant = Tenant::where('domin',$host)->first();
            if($tenant == null ||  $tenant->database == null){
                abort(404);
            };
            TenantService::switchToTanent($tenant);
        }
        
        return $next($request);
    }
}
