<?php

use Carbon\Carbon;
use App\Models\Otp;
use App\Models\User;
use App\Facade\Tenants;
use App\Models\setting;
use App\Models\notifiction;
use Illuminate\Support\Str;
use App\service\TenantService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

function getsetting()
{
    $namedomain = Tenants::getdomain();

    if (Cache::get($namedomain . '_settings', []) == null) {
        Cache::forget($namedomain . '_settings');
        Cache::rememberForever($namedomain . '_settings', function () {
            return DB::table('settings')->find(1);
        });
    }
    return Cache::get($namedomain . '_settings', []);
}
function setsettingwithdomain($namedomain)
{
    Cache::forget($namedomain . '_settings');
    Cache::rememberForever($namedomain . '_settings', function () {
        return setting::on('tenant')->find(1);
    });
    // return Cache::get($namedomain.'_settings',[]) ;
}
function setsetting()
{
    $namedomain = Tenants::getdomain();
    Cache::forget($namedomain . '_settings');
    Cache::rememberForever($namedomain . '_settings', function () {
        return DB::table('settings')->find(1);
    });
    // return Cache::get($namedomain.'_settings',[]) ;
}
function Resp($data = null, $msg = null, $status = 200, $statusval = true)
{
    if ($status == 422) {
        return response()->json(['errors' => $data, 'msg' => $msg, 'status' => $status, 'statusval' => $statusval = false], $status);
    } elseif ($status != 200) {
        return response()->json(['msg' => $msg, 'status' => $status, 'statusval' => $statusval = false], $status);
    } else {
        return response()->json(['data' => $data, 'msg' => $msg, 'status' => $status, 'statusval' => $statusval], $status);
    }
}
function sendsms($phone)
{
    $settings  =  Cache::get('settings', []);

    if (env('SMS_OTP', false) === false) {
        return 1;
    } else {
        // $code = rand(123456, 999999);
        // $msg = 'كود التحقق ' . $code;
        $response = Http::contentType('application/json')->accept('application/json')->post('https://smssmartegypt.com/sms/api/otp-send', [
            'username'  => $settings->sms_username,
            'password'  => $settings->sms_password,
            'sender'    => $settings->sms_senderid,
            'mobile'    => '2' . $phone,
            'lang'      => 'ar'
        ]);
        $res = $response->json();
        // Log::error($phone);
        // Log::error($res);
        if ($res['type'] ?? 'error' == 'error') {
            return 0;
        } else {
            return 1;
        };
    }
}

function otp_check($phone, $code)
{
    if (env('SMS_OTP', false) === false) {
        return 1;
    } else {
        $response = Http::accept('application/json')->post('https://smssmartegypt.com/sms/api/otp-check', [
            'username'  => env('SMS_USERNAME', 'hosamalden236@gmail.com'),
            'password'  => env('SMS_PASSWORD', '0101196246'),
            'mobile'    => '2' . $phone,
            'otp'       => $code,
            'verify' => true
        ]);
        $res = $response->json();
        if ($res['type'] == 'error') {
            return 0;
        } else {
            return 1;
        }
    }
}
function deleteimage($folder, $image)
{
    $nametenant = Tenants::gettenantname();
    $file = public_path() . '/asset/images/'  . $nametenant .'/'. $folder . '/' . $image;
    $img = File::delete($file);
    // Storage::disk($path)->delete($image);
}
function uploadbase64images($folder, $image)
{
    $nametenant = Tenants::gettenantname();
    $path = public_path() . '/asset/images/' . $nametenant .'/'. $folder;
    if (!File::exists($path)) {
        mkdir($path, 0777, true);
    }
    $image = $image;  // your base64 encoded
    $image = str_replace('data:image/png;base64,', '', $image);
    $image = str_replace(' ', '+', $image);
    $imageName = Str::random(10) . '.' . 'png';
    File::put($path . '/' . $imageName, base64_decode($image));
    return  $imageName;
}
function uploadimages($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    return  $filename;
}
function notificationFCM($title = null, $body = null, $users = null, $icon = null, $image = null, $link = null, $click = null, $sav = true)
{



    $SERVER_API_KEY = getsetting()->fire_servies;
    $data = [
        "registration_ids" => $users,
        "notification" => [
            "title" => $title,
            "body" => $body,
            // "icon" => 'https://images.theconversation.com/files/93616/original/image-20150902-6700-t2axrz.jpg',
            "image" => $image,
            "fcm_options.link" => $link,
            "click_action" => $click,
        ],
        "actions" => [
            "title" => "Like",
            "action" => "like",
            "icon" => "icons/heart.png"
        ],
    ];
    $dataString = json_encode($data);
    $headers = [
        'Authorization: key=' . $SERVER_API_KEY,
        'Content-Type: application/json',
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
    $uu = null;
    if (count($users) == 1) {
        $uu = User::where('fsm', $users[0])->first();
    }
    if ($sav == true) {
        notifiction::create(['title' => $title, 'user_id' => $uu->id ?? $uu, 'body' => $body, 'image' => $image, 'results' =>   curl_exec($ch)]);
    }
    return  curl_exec($ch);
}
function replacetext($originalString, $user = null, $product = null, $cart = null, $statu = null)
{
    $replacements = [
        '{statu}'  => $statu ?? '',
        '{name}'  => $user->client_name ?? '',
        '{email}' => $user->email ?? '',
        '{oldprice}' => $product->productd_Sele1 ?? '',
        '{newprice}' => $product->productd_Sele2 ?? '',
        '{exp_date}' => $product->EndOferDate ?? '',
        '{product_name}' => $product->productheader->product_name ?? '',
    ];

    foreach ($replacements as $placeholder => $value) {
        $originalString = str_replace($placeholder, $value, $originalString);
    }

    return $originalString;
}
function getimage($imagename,$folder){
        $nametenant = Tenants::gettenantname();
        $path = public_path('asset/images2/'. $nametenant . '/'.$folder.'/' . $imagename);
            if (File::exists($path)) {
                return ($imagename !== null) ? asset('asset/images2/'. $nametenant . '/'.$folder.'/' . $imagename) : asset('asset/images2/'. $nametenant . '/'.getsetting()->logo_shop);
            } else {

                // return asset('asset/images/noimage.jpg');
                return   asset('asset/images2/'. $nametenant . '/'.getsetting()->logo_shop);
            }
}
