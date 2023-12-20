<?php

namespace App\Repository;

use App\Models\User;
use App\Models\setting;
use App\Models\question;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\LoginUserResource;
use App\Repositoryinterface\UserRepositoryinterface;

class DBUserRepository implements UserRepositoryinterface
{
    protected Model $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    #############################################################
    ########################## API V2 ###########################
    #############################################################
    public function checkphone($phone)
    {
        $user = $this->model->where('client_fhonewhats', $phone)->first();
        if ($user != null) {
            $d = [];
            $d[0]=   [  "id" =>  $user->question1->id, "question" => $user->question1->question];
            $d[1]=   [  "id" =>  $user->question2->id, "question" => $user->question2->question ];

            return Resp($d, 'success', 200, true);
        } else {
            return Resp('', 'هاتف غير مسجل', 302, false);
        }
    }
    public function checkanswer($request)
    {
        $user = $this->model->where(
            [
                'client_fhonewhats'   => $request->client_fhonewhats,
                'answer1' => $request->answer1,
                'answer2' => $request->answer2,
            ]
        )->first();
        if ($user != null) {
            return $this->credentials($user);
        } else {
            return Resp('', 'اجابة الاسئلة غير صحيحه او هاتفك غير مسجل', 302, false);
        }
    }
    public function login($request)
    {
        // User::query()->update(['password' =>  Hash::make('123456')]);


        $token =  Auth::guard('api')->attempt(['client_fhonewhats' => $request->get('client_fhonewhats'), 'password' => $request->get('password')]);
        if ($token == null) {
            return Resp(null, 'User Not found', 404, false);
        }
        if (auth('api')->user()->client_Active == 0) {
            return Resp(null, 'تم ايقاف حسابك ', 404, false);
        }

        $user =  auth('api')->user();
        $user->token = $token;
        $user->setting = $this->settings();
        $data =  new UserResource($user);
        $text = getsetting()->notif_welcome_text;
        $rep = replacetext($text, $user);
        notificationFCM('اهلا بك', $rep, [$user->fsm], null, null, null, null, false);
        return Resp($data, 'Success', 200, true);
    }
    public function getuserdata()
    {
        $user =  auth('api')->user();
        $user->setting = $this->settings();
        $data =  new UserResource($user);
        return Resp($data, 'Success', 200, true);
    }
    public function edit($request)
    {

        DB::beginTransaction();
        try {
            $user =  User::find(Auth::guard('api')->user()->id);
            $user->client_name       = $request['client_name'] ?? $user->client_name;
            $user->password          = $request['password'] ?? $user->password;
            $user->client_fhoneLeter = $request['client_fhoneLeter'] ?? $user->client_fhoneLeter;
            $user->region_id         = $request['region_id'] ?? $user->region_id;
            $user->store_name        = $request['store_name'] ?? $user->store_name;
            $user->lat_mab           = $request['lat_mab'] ?? $user->lat_mab;
            $user->long_mab          = $request['long_mab'] ?? $user->long_mab;
            $user->client_state      = $request['client_state'] ?? $user->client_state;
            $user->CategoryAPP       = $request['CategoryAPP'] ?? $user->CategoryAPP;
            $user->client_code       = $request['client_code'] ?? $user->client_code;
            $user->store_name        = $request['store_name'] ?? $user->store_name;
            $user->question1_id      = $request['question1_id'] ?? $user->question1_id;
            $user->question2_id      = $request['question2_id'] ?? $user->question2_id;
            $user->answer1           = $request['answer1'] ?? $user->answer1;
            $user->answer2           = $request['answer2'] ?? $user->answer2;
            $user->save();
            $data =  new UserResource($user);
            DB::commit();
            return Resp($data, 'Success', 200, true);
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            DB::rollback();
            return false;
            // something went wrong
        }
    }

    public function register($request)
    {
        // Log::warning($request);
        $user = User::create([
            'client_name' => $request['client_name'] ?? null,
            'password'     =>  Hash::make($request['password']) ?? null,
            'client_fhonewhats' => $request['client_fhonewhats'] ?? null,
            'client_fhoneLeter' => $request['client_fhoneLeter'] ?? null,
            'region_id' => $request['region_id'] ?? null,
            'lat_mab' => $request['lat_mab'] ?? null,
            'long_mab' => $request['long_mab'] ?? null,
            'client_state' => $request['client_state'] ?? null,
            'long_mab' => $request['long_mab'] ?? null,
            'CategoryAPP' => $request['CategoryAPP'] ?? null,
            'client_code' => $request['client_code'] ?? null,
            'store_name' => $request['store_name'] ?? null,
            'question1_id' => $request['question1_id'] ?? null,
            'question2_id' => $request['question2_id'] ?? null,
            'answer1'      => $request['answer1'] ?? null,
            'answer2'      => $request['answer2'] ?? null
        ]);

        if (!$token = auth('api')->login($user)) {
            return Resp(null, 'Unauthorized', 404, false);
        }
        $user->token = $token;
        $user->setting = $this->settings();
        $text = getsetting()->notif_welcome_text;
        // Log::error($user);
        $rep = replacetext($text,  $user);
        notificationFCM('اهلا بك', $rep, [$user->fsm], null, null, null,   null, false);
        return $user;
    }
    public function credentials($user)
    {
        if (!$token = auth('api')->login($user)) {
            return Resp(null, 'Unauthorized', 404, false);
        }
        $user = $this->model->where('client_fhonewhats', $user->client_fhonewhats)->first();
        $user->token = $token;
        $user->setting = $this->settings();
        $data =  new LoginUserResource($user);
        return Resp($data, 'Success', 200, true);
    }
    #############################################################
    ########################## API V2 ###########################
    #############################################################


    public function sendotp($phone)
    {
        $response = sendsms($phone);
        if ($response  == 1) {
            return Resp('', 'تم ارسال كود التحقق', 200, true);
        } else {
            return Resp('', 'خطاء فى ارسال كود التحقق', 302, false);
        }
    }
    public function verificationcode($request)
    {
        $response = otp_check($request->get('client_fhonewhats'), $request->code);

        if ($response === 1) {
            return $this->login($request);
        } else {
            return Resp('', 'كود التحقق خطاء', 302, false);
        }
    }
    // public function login($request)
    // {
    //     $user = User::where('client_fhonewhats', $request->get('client_fhonewhats'))->first();
    //     if ($user == null) {
    //         return Resp(null, 'User Not found', 404, false);
    //     }
    //     if (!$token = auth('api')->login($user)) {
    //         return Resp(null, 'Unauthorized', 404, false);
    //     }
    //     $user->token = $token;
    //     $user->setting = $this->settings();

    //     $data =  new UserResource($user);

    //     $text = getsetting()->notif_welcome_text;

    //     $rep = replacetext($text, $user);
    //     notificationFCM('اهلا بك', $rep, [$user->fsm]);
    //     return Resp($data, 'Success', 200, true);
    // }
    // public function edit($request)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $user =  User::find(Auth::guard('api')->user()->id);
    //         $user->client_name       = $request['client_name'] ?? $user->client_name;
    //         $user->client_fhoneLeter = $request['client_fhoneLeter'] ?? $user->client_fhoneLeter;
    //         $user->region_id         = $request['region_id'] ?? $user->region_id;
    //         $user->store_name        = $request['store_name'] ?? $user->store_name;
    //         $user->lat_mab           = $request['lat_mab'] ?? $user->lat_mab;
    //         $user->long_mab          = $request['long_mab'] ?? $user->long_mab;
    //         $user->client_state      = $request['client_state'] ?? $user->client_state;
    //         $user->CategoryAPP       = $request['CategoryAPP'] ?? $user->CategoryAPP;
    //         $user->client_code       = $request['client_code'] ?? $user->client_code;
    //         $user->store_name        = $request['store_name'] ?? $user->store_name;
    //         $user->save();
    //         $data =  new UserResource($user);
    //         return Resp($data, 'Success', 200, true);
    //         DB::commit();
    //         return true;
    //     } catch (\Exception $e) {
    //         Log::warning($e->getMessage());
    //         DB::rollback();
    //         return false;
    //         // something went wrong
    //     }
    // }
    // public function register($request)
    // {
    //     // Log::warning($request);
    //     $user = User::create([
    //         'client_name' => $request['client_name'] ?? null,
    //         'password'     => $request['password'] ?? null,
    //         'client_fhonewhats' => $request['client_fhonewhats'] ?? null,
    //         'client_fhoneLeter' => $request['client_fhoneLeter'] ?? null,
    //         'region_id' => $request['region_id'] ?? null,
    //         'lat_mab' => $request['lat_mab'] ?? null,
    //         'long_mab' => $request['long_mab'] ?? null,
    //         'client_state' => $request['client_state'] ?? null,
    //         'long_mab' => $request['long_mab'] ?? null,
    //         'CategoryAPP' => $request['CategoryAPP'] ?? null,
    //         'client_code' => $request['client_code'] ?? null,
    //         'store_name' => $request['store_name'] ?? null
    //     ]);

    //     if (!$token = auth('api')->login($user)) {
    //         return Resp(null, 'Unauthorized', 404, false);
    //     }
    //     $user->token = $token;
    //     $user->setting = $this->settings();
    //     $text = getsetting()->notif_welcome_text;
    //     // Log::error($user);
    //     $rep = replacetext($text,  $user);
    //     notificationFCM('اهلا بك', $rep, [$user->fsm]);
    //     return $user;
    // }
    public function getusers($pg = 30,$search=null)
    {
        if($search != null){
            return  User::where('client_name', 'LIKE', "%" . $search  . "%")->orwhere('client_fhonewhats', 'LIKE', "%" . $search  . "%")->paginate($pg);
        }
        return  User::paginate($pg);
    }
    public function settings()
    {
        $dd = setting::find(1);
        return  $dd->toArray();
    }
    public function sendtoken($token)
    {

        // Log::alert('sendtoken', ['user' => auth('api')->user(), 'token' => $token]);

        if (auth('api')->user() != null) {
            $user = User::find(auth('api')->user()->id);
            $user->update(['fsm' => $token]);
        }
        return response()->json(['Token successfully stored.']);
    }
    public function logout()
    {
        return  auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
