<?php

function Resp($data =null , $msg = null , $status = 200 ,$statusval=true){
    if($status == 422 ){
        return response()->json(['errors'=>$data ,'msg' => $msg , 'status' => $status ],$status) ;
    }elseif($status != 200 ){
        return response()->json(['msg' => $msg , 'status' => $status ],$status) ;
    }else{
        return response()->json(['data' => $data  , 'msg' => $msg , 'status' => $status , 'statusval' => $statusval],$status) ;
    }
}
