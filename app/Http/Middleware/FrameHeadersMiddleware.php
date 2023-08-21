<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FrameHeadersMiddleware
{


    public function handle($request, Closure $next)
    {
         $response = $next($request);
         $response->headers->set('X-Frame-Options', 'SAMEORIGIN', false);
        //  $response->header('X-Frame-Options', 'ALLOW FROM https://www.medawee.com/');
         return $response;
     }
}
