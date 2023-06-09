<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
class LastSeenUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        if (auth('admin')->check()) {
            // dd(Auth::user()->id);
            $expireTime = Carbon::now()->addMinute(1); // keep online for 1 min
            Cache::put('is_online'.Auth::guard('admin')->user()->id, true, $expireTime);

            //Last Seen
            User::where('id', Auth::guard('admin')->user()->id)->update(['last_seen' => Carbon::now()]);
        }
        if (auth('client')->check()) {

            $expireTime = Carbon::now()->addMinute(1); // keep online for 1 min
            Cache::put('is_online'.Auth::guard('client')->user()->id, true, $expireTime);

            //Last Seen
            User::where('id', Auth::guard('client')->user()->id)->update(['last_seen' => Carbon::now()]);
        }
        return $next($request);
    }
}
