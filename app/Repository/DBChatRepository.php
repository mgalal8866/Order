<?php

namespace App\Repository;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Message;
use App\Models\deferred;
use App\Models\conversion;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\chat\ChatResource;
use App\Repositoryinterface\ChatRepositoryinterface;

class DBChatRepository implements ChatRepositoryinterface
{
    public function sentmessage($message)
    {
        $conversion = conversion::where('client_id', Auth::guard('api')->user()->id)->first();
        if ($conversion) {
<<<<<<< HEAD
             $messages =  Message::create(['conversions_id'=> $conversion->id,'message' => $message, 'client_id' => Auth::guard('api')->user()->id]);;
            return new ChatResource($messages);
            }else{
            $conversion = conversion::create(['client_id'=> Auth::guard('api')->user()->id]);
            $messages = Message::create(['conversions_id' => $conversion->id, 'message' => $message, 'client_id' => Auth::guard('api')->user()->id]);;
=======
             $messages =  message::create(['conversions_id'=> $conversion->id,'message' => $message, 'client_id' => Auth::guard('api')->user()->id]);;

            return new ChatResource($messages);
            }else{
            $conversion = conversion::create(['client_id'=> Auth::guard('api')->user()->id]);
            $messages = message::create(['conversions_id' => $conversion->id, 'message' => $message, 'client_id' => Auth::guard('api')->user()->id]);;

>>>>>>> cbd55b68f339319495030a0d2d3e9cb7d689c70f
            return new ChatResource($messages);
        }
    }
    public function getmessage()
    {
         $messages= Message::WhereHas('conversion', function ($query) {
            return $query->where('client_id', Auth::guard('api')->user()->id);
        })->get();
        return  $messages;
    }
}
