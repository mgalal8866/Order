<?php

namespace App\Repository;

use App\Http\Resources\UserDelivery as ResourcesUserDelivery;
use App\Models\User;
use App\Models\setting;
use App\Models\UserDelivery;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Repositoryinterface\UserDeliveryRepositoryinterface;


class DBUserDeliveryRepository implements UserDeliveryRepositoryinterface
{
    public function login($request)
    {
        $credentials = $request->only('username', 'password');
        // UserDelivery::create($credentials);
        try {
            if (!$token = Auth::guard('delivery')->attempt($credentials)) {
                return Resp('', 'error', 401, true);

            }
        } catch (JWTException $e) {
            return Resp('', 'error', 500, true);
        }

        return $this->respondWithToken($token);
    }
    public function edit($request)
    {
        DB::beginTransaction();
        try {


            $user =  User::find(Auth::user('api')->id);
            $user->client_name       = $request['client_name'] ?? $user->client_name;
            $user->client_fhoneLeter = $request['client_fhoneLeter'] ?? $user->client_fhoneLeter;
            $user->region_id         = $request['region_id'] ?? $user->region_id;
            $user->store_name        = $request['store_name'] ?? $user->store_name;
            $user->lat_mab           = $request['lat_mab'] ?? $user->lat_mab;
            $user->long_mab          = $request['long_mab'] ?? $user->long_mab;
            $user->client_state      = $request['client_state'] ?? $user->client_state;
            $user->CategoryAPP       = $request['CategoryAPP'] ?? $user->CategoryAPP;
            $user->client_code       = $request['client_code'] ?? $user->client_code;
            $user->store_name        = $request['store_name'] ?? $user->store_name;
            $user->save();
            $data =  new UserResource($user);
            return Resp($data, 'Success', 200, true);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            DB::rollback();
            return false;
            // something went wrong
        }
    }
    public function register($request)
    {
        Log::warning($request);
        $user = User::create([
            'client_name' => $request['client_name'] ?? null,
            'client_fhonewhats' => $request['client_fhonewhats'] ?? null,
            'client_fhoneLeter' => $request['client_fhoneLeter'] ?? null,
            'region_id' => $request['region_id'] ?? null,
            'lat_mab' => $request['lat_mab'] ?? null,
            'long_mab' => $request['long_mab'] ?? null,
            'client_state' => $request['client_state'] ?? null,
            'long_mab' => $request['long_mab'] ?? null,
            'CategoryAPP' => $request['CategoryAPP'] ?? null,
            'client_code' => $request['client_code'] ?? null,
            'store_name' => $request['store_name'] ?? null
        ]);

        if (!$token = auth('api')->login($user)) {
            return Resp(null, 'Unauthorized', 404, false);
        }
        $user->token = $token;
        $user->setting = $this->settings();
        return $user;
    }
    public function getusers()
    {
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'success' => true,
            'data' => [
                'data' => new ResourcesUserDelivery (Auth::guard('delivery')->user()),
                'access_token' => $token,
                'token_type' => 'bearer',
                // 'expires_in' => auth()->factory()->getTTL() * 60
            ]
        ], 200);
    }
    public function settings()
    {
        $dd = setting::find(1);
        return  $dd->toArray();
    }
    public function sendtoken($token)
    {
        auth('delivery')->user()->update(['fsm' => $token]);
        return response()->json(['Token successfully stored.']);
    }
    public function logout()
    {
        return  auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
