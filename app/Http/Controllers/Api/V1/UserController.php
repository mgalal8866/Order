<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\setting;

use App\Models\CateoryApp;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\RegisterUser;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;
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
     public function category_app()
    {
        $dd =setting::find(1);
        // dd(  $dd->toArray());
       return  $dd->toArray();
        // return $this->respondWithToken(auth()->refresh());
    }
}
