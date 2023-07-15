<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {

            if (in_array('auth:client', $request->route()->middleware())) {
                return route('frontlogin');
            }
            if (in_array('auth:admin', $request->route()->middleware())) {
                return route('dashlogin');
            }
            return route('dashlogin');
        }
    //    dd(auth()->guard);
    //     return $request->expectsJson() ? null : route('login');
    }
}
