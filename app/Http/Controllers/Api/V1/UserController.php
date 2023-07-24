<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\setting;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUser;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Repositoryinterface\UserRepositoryinterface;

class UserController extends Controller
{
    private $userRepositry;
    public function __construct(UserRepositoryinterface $userRepositry)
    {
        $this->userRepositry = $userRepositry;
    }
    public function register(RegisterUser $request)
    {
        $data = new UserResource($this->userRepositry->register($request->validated()));
        return Resp($data, 'Success', 200, true);
    }

    public function login(Request $request)
    {
        return   $this->userRepositry->login($request);
    }
    public function edit(Request $request)
    {
        return   $this->userRepositry->edit($request->all());
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

    public function sendtoken($token)
    {
        return $this->userRepositry->sendtoken($token);
    }
    public function category_app()
    {
        $dd = setting::find(1);
        // dd(  $dd->toArray());
        return  $dd->toArray();
        // return $this->respondWithToken(auth()->refresh());
    }
}
