<?php

namespace App\Repository;

use App\Models\User;
use App\Models\setting;
use App\Http\Resources\UserResource;
use App\Repositoryinterface\UserRepositoryinterface;

class DBUserRepository implements UserRepositoryinterface
{
    public function login($request)
    {
        $user = User::where('client_fhonewhats', $request->get('client_fhonewhats'))->first();
        if ($user == null) {
            return Resp(null,'User Not found', 404, false);
        }
        if (!$token = auth()->login($user)) {
            return Resp(null,'Unauthorized', 404, false) ;
        }
        $user->token = $token;
        $user->setting = $this->settings();

        $data =  new UserResource($user);
        return Resp($data, 'Success', 200, true);;
    }
    public function register($request)
    {
        $user = User::create($request);
            if (!$token = auth()->login($user)) {
                return Resp(null,'Unauthorized', 404, false) ;
            }
        $user->token = $token;
        $user->setting = $this->settings();
        return $user;

    }
    public function settings()
    {
        $dd =setting::find(1);
       return  $dd->toArray();

    }
    public function logout()
    {
        return  auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
