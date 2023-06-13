<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUser;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterUser $request)
    {
        $user = User::create($request->validated());
        if (! $token = auth()->login($user)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user->token = $token;
        $data =   new UserResource($user) ;
           return Resp($data,'Success',200,true);
        // return $this->respondWithToken($token, $user );
    }
    public function login(Request $request)
    {
        $user = User::where('client_fhonewhats', $request->get('client_fhonewhats'))->first();
        if($user == null){
            return Resp('','User Not found',201);
        }
        if (! $token = auth()->login($user)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
            $user->token = $token;

            $data =   new UserResource($user) ;
            return Resp($data,'Success',200,true);
        // return $this->respondWithToken($token, $user );
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }


    protected function respondWithToken($token,$user=null)
    {
        return response()->json([
            'data' => $user??'',
            'access_token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }


     public function refresh()
    {
        // return $this->respondWithToken(auth()->refresh());
    }
}
