<?php

namespace App\Repository;

use App\Models\User;
use App\Models\setting;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Repositoryinterface\UserRepositoryinterface;

class DBUserRepository implements UserRepositoryinterface
{
    public function login($request)
    {
        $user = User::where('client_fhonewhats', $request->get('client_fhonewhats'))->first();
        if ($user == null) {
            return Resp(null, 'User Not found', 404, false);
        }
        if (!$token = auth()->login($user)) {
            return Resp(null, 'Unauthorized', 404, false);
        }
        $user->token = $token;
        $user->setting = $this->settings();
        // dd($user);
        $data =  new UserResource($user);
        return Resp($data, 'Success', 200, true);;
    }
    public function edit($request)
    {
        DB::beginTransaction();
        try {


            $user =  User::find(Auth::user()->id);
            $user->client_name       = $request['client_name'];
            $user->client_fhoneLeter = $request['client_fhoneLeter'];
            $user->region_id         = $request['region_id'];
            $user->lat_mab           = $request['lat_mab'];
            $user->long_mab          = $request['long_mab'];
            $user->client_state      = $request['client_state'];
            $user->long_mab          = $request['long_mab'];
            $user->CategoryAPP       = $request['CategoryAPP'];
            $user->client_code       = $request['client_code'];
            $user->save();
            $data =  new UserResource($user);
            return Resp($data, 'Success', 200, true);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            DB::rollback();
            return false;
            // something went wrong
        }
    }
    public function register($request)
    {
        $user = User::create($request);
        if (!$token = auth()->login($user)) {
            return Resp(null, 'Unauthorized', 404, false);
        }
        $user->token = $token;
        $user->setting = $this->settings();
        return $user;
    }
    public function getusers()
    {
        return  User::paginate(10);
    }

    public function settings()
    {
        $dd = setting::find(1);
        return  $dd->toArray();
    }
    public function logout()
    {
        return  auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
