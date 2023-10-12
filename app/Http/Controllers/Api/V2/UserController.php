<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\setting;
use App\Models\question;
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
    public function checkphone($phone)
    {
        return $this->userRepositry->checkphone_v2($phone);
    }

    public function checkanswer(Request $request)
    {
        return $this->userRepositry->checkanswer_v2($request);
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

    protected function respondWithToken($token, $user = null)
    {
        return response()->json([
            'data' => $user ?? '',
            'access_token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
    public function question()
    {
        $question = question::get();
        return Resp($question, 'success');
    }
}
