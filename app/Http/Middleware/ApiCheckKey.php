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
        if (env('API_KEY') != false) {

            $keys = DB::table('api_tokens')->where('token',$request->header('api-token'))->first();
            if($keys == null || empty($keys)){
                $data = [
                    'status' => 201,
                    'msg'    => 'Api Token Not Found'
                ];
                return response()->json($data);
            }else{
                $request->attributes->add(['source_api' => $keys->name]);
                return $next($request);
            }

            // if ($keys->pluck('token')->contains($request->header('api-token'))) {
            // if ($keys->pluck('token')->contains($request->header('api-token'))) {
            // }
            // return response()->json($data);
        } else {
            return $next($request);
        }
    }
}
