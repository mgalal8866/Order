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
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class UserController extends Controller
{
public function LoginOtp()
{
    # code...
}
    public function register(RegisterUser $request)
    {
      
        User::create($request->validated());
        dd($request->client_name,$request->client_fhoneWhats,$request->client_fhoneLeter,$request->region_id,$request->long_mab,$request->lat_mab,$request->client_state,$request->CategoryAPP);
    }
    public function getusers()
    {
        $user = User::all();
        return $user ;
    }

    public function login()
    {
        $credentials = request(['phone', 'password']);
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    protected function respondWithToken($token)
    {
        return response()->json([
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
