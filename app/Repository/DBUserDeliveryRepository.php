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
       $user =  Auth::guard('delivery')->user();
       if($user->active ==0){
        return Resp('', 'error', 500, false);
       }else{
           return $this->respondWithToken($token);
        }
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'data' => [
                'user' => new ResourcesUserDelivery (Auth::guard('delivery')->user()),
                'access_token' => $token,
                'token_type' => 'bearer',
                // 'expires_in' => auth()->factory()->getTTL() * 60
            ],
                'success' => true,
        ], 200);
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
    public function settings()
    {

    }
    public function edit($request)
    {

    }
    public function register($request)
    {

    }
    public function getusers()
    {
    }
    public function updatemap($request)
    {

dd(Auth::guard('delivery')->id);
      $userddelivery =   UserDelivery::where('id',Auth::guard('delivery')->user()->id)->update(['lat'=>$request->lat,'long'=>$request->long]);
      if($userddelivery){
          Resp( $userddelivery   ,'success',200,true);
        }else{
            Resp( '','error',401,false);

        }
    }
    public function checkblock($request)
    {

            // $userd = UserDelivery::find(Auth::guard('delivery')->user()->id);
            // if($userd ){
            //     Resp( $userd    ,'success',200,true);
            //   }else{
            //       Resp( '','error',401,$userd->active?);

            //   }
    }
}


