<?php

function Resp($data = null , $msg = null , $status = 200 ,$statusval=true){
    if($status == 422 ){
        return response()->json(['errors'=>$data ,'msg' => $msg , 'status' => $status ,'statusval' =>$statusval=false],$status) ;
    }elseif($status != 200 ){
        return response()->json(['msg' => $msg , 'status' => $status,'statusval' =>$statusval=false ],$status) ;
    }else{
        return response()->json(['data' => $data  , 'msg' => $msg , 'status' => $status , 'statusval' => $statusval],$status) ;
    }
}
  function uploadimages($folder,$image){
    $image->store('/',$folder);
    $filename = $image->hashName();
    return  $filename;
}
 function notificationFCM($title =null,$body =null, $users=null,$icon =null,$image =null,$link =null,$click =null){

    // $firebaseToken =   User::whereNotNull('device_token')->pluck('device_token');
    // return $firebaseToken;
    $SERVER_API_KEY = env('FCM_SERVER_KEY',null);
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
        "actions"=> [
            "title"=> "Like",
              "action"=> "like",
              "icon"=> "icons/heart.png"
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


    return  curl_exec($ch);
}

