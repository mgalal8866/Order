<?php

use Carbon\Carbon;
use App\Models\Otp;
use App\Models\User;
use App\Models\notifiction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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
function uploadimages($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    return  $filename;
}
function sendsms($phone)
{
    if (env('SMS_OTP', false) === false) {
        return 1;
    } else {
        // $code = rand(123456, 999999);
        // $msg = 'كود التحقق ' . $code;
        $response = Http::contentType('application/json')->accept('application/json')->post('https://smssmartegypt.com/sms/api/otp-send', [
            'username'  => env('SMS_USERNAME', 'hosamalden236@gmail.com'),
            'password'  => env('SMS_PASSWORD', '0101196246'),
            'sender'    => env('SMS_SENDERID', 'ELMOSWK'),
            'mobile'    => '2' . $phone,
            'lang'      => 'ar'
        ]);
        $res = $response->json();
        Log::error( $res);
        if ($res['type'] == 'error') {
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
function deleteimage($path, $image)
{
    Storage::disk($path)->delete($image);
}
function uploadbase64images($folder, $image)
{
    $image = $image;  // your base64 encoded
    $image = str_replace('data:image/png;base64,', '', $image);
    $image = str_replace(' ', '+', $image);
    $imageName = Str::random(10) . '.' . 'png';
    File::put(public_path() . '/asset/images/' . $folder . '/' . $imageName, base64_decode($image));


    // $folderPath = public_path(). '/asset/images/' . $folder.'/';
    // $base64Image = explode(";base64,", $image);
    // $explodeImage = explode("image/", $base64Image[0]);
    // $imageType = $explodeImage[1];
    // $image_base64 = base64_decode($base64Image[1]);
    // $imageName =  uniqid() . '. '.$imageType;
    // $file = $folderPath .$imageName ;
    // file_put_contents($file, $image_base64);
    return  $imageName;
}
function notificationFCM($title = null, $body = null, $users = null, $icon = null, $image = null, $link = null, $click = null)
{

    // $firebaseToken =   User::whereNotNull('device_token')->pluck('device_token');
    // return $firebaseToken;
    // notifiction::create()
    $SERVER_API_KEY = env('FCM_SERVER_KEY', null);
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

    notifiction::create(['title' => $title, 'body' => $body, 'image' => $image, 'results' =>   curl_exec($ch)]);
    // return  curl_exec($ch);
}
