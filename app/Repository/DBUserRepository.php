<?php

namespace App\Repository;

use App\Models\User;
use App\Repositoryinterface\UserRepositoryinterface;

class DBUserRepository implements UserRepositoryinterface
{
    public function login($request)
    {
        $user = User::where('client_fhonewhats', $request->get('client_fhonewhats'))->first();
        if ($user == null) {
            return 'User Not found';
        }
        if (!$token = auth()->login($user)) {
            return  'Unauthorized';
        }
        $user->token = $token;
        return $user;
    }
    public function register($request)
    {
        $user = User::create($request);
        if (!$token = auth()->login($user)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user->token = $token;
        return $user;
    }
    public function logout()
    {
        return  auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
