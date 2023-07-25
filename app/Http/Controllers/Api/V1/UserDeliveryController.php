<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Repositoryinterface\UserDeliveryRepositoryinterface;

class UserDeliveryController extends Controller
{
    private $userdeliveryRepositry;
    public function __construct(UserDeliveryRepositoryinterface $userdeliveryRepositry)
    {
        $this->userdeliveryRepositry = $userdeliveryRepositry;
    }
    public function register( $request)
    {
        $data = new UserResource($this->userdeliveryRepositry->register($request->validated()));
        return Resp($data, 'Success', 200, true);
    }

    public function login(Request $request)
    {
        return   $this->userdeliveryRepositry->login($request);
    }
    public function edit(Request $request)
    {
        return   $this->userdeliveryRepositry->edit($request->all());
    }
    public function logout()
    {
        return $this->userdeliveryRepositry->logout();
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
        return $this->userdeliveryRepositry->sendtoken($token);
    }
    public function category_app()
    {
        $dd = setting::find(1);
        return  $dd->toArray();
    }
}
