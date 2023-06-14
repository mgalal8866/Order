<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUser;
use App\Http\Resources\UserResource;
use App\Repositoryinterface\UserRepositoryinterface;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $userRepositry;
    public function __construct(UserRepositoryinterface $userRepositry)
    {
        $this->userRepositry = $userRepositry;
    }
    public function register(RegisterUser $request)
    {
        $data = $this->userRepositry->register($request);
        if (!is_array($data)) return Resp($data, 'Error', 200, true);
        $data =   new UserResource($this->userRepositry->register($request->validated()));
        return Resp($data, 'Success', 200, true);
    }
    public function login(Request $request)
    {
        $data = $this->userRepositry->login($request);
        if (!is_array($data)) return Resp($data, 'Error', 200, true);
        $data =  new UserResource($this->userRepositry->login($request));
        return Resp($data, 'Success', 200, true);
    }
    public function logout()
    {
        return $this->userRepositry->logout();
    }

    protected function respondWithToken($token, $user = null)
    {
        return response()->json([
            'data' => $user ?? '',
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
