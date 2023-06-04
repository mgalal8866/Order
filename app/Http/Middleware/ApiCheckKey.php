<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ApiCheckKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $keys = DB::table('api_tokens')->select('token')->pluck('token');
        if(  $keys->contains($request->header('api_token')))
        {
            return $next($request);
        }
        $data = [
            'status'=> 201,
            'msg' => 'Filed'
        ];
        return response()->json($data);
    }
}
