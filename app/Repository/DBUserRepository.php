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
        if (!$token = auth('api')->login($user)) {
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


            $user =  User::find(Auth::user('api')->id);
            $user->client_name       = $request['client_name']??$user->client_name ;
            $user->client_fhoneLeter = $request['client_fhoneLeter']??$user->client_fhoneLeter ;
            $user->region_id         = $request['region_id']??$user->region_id         ;
            $user->store_name        = $request['store_name']??$user->store_name        ;
            $user->lat_mab           = $request['lat_mab']??$user->lat_mab           ;
            $user->long_mab          = $request['long_mab']??$user->long_mab          ;
            $user->client_state      = $request['client_state']??$user->client_state      ;
            $user->CategoryAPP       = $request['CategoryAPP']??$user->CategoryAPP       ;
            $user->client_code       = $request['client_code']??$user->client_code       ;
            $user->store_name        = $request['store_name']??$user->store_name        ;
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
        $user = User::create([
        'client_name'=>$request['client_name'],
        'client_fhonewhats'=>$request['client_fhonewhats'],
        'client_fhoneLeter'=>$request['client_fhoneLeter'],
        'region_id'=>$request['region_id'],
        'lat_mab'=>$request['lat_mab'],
        'long_mab'=>$request['long_mab'],
        'client_state'=>$request['client_state'],
        'long_mab'=>$request['long_mab'],
        'CategoryAPP'=>$request['CategoryAPP'],
        'client_code'=>$request['client_code']]);
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
