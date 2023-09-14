<?php

namespace App\Repository;

use App\Facade\Tenants;
use App\Http\Resources\chat\ChatResource;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\conversion;
use App\Models\deferred;
use App\Models\Message;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Repositoryinterface\ChatRepositoryinterface;

class DBChatRepository implements ChatRepositoryinterface
{


    public function sentmessage($message)
    {
        // Tenants::changepusher();
        $conversion = conversion::where('client_id', Auth::guard('api')->user()->id)->first();
        if (!$conversion) {
            $conversion = conversion::create(['client_id'=> Auth::guard('api')->user()->id]);
        }
        $messages =  Message::create(['seenmsg' =>  0,'conversions_id'=> $conversion->id,'message' => $message, 'client_id' => Auth::guard('api')->user()->id]);;
        return new ChatResource($messages);
    }
    public function getmessage()
    {

        // Tenants::changepusher();
         $messages= Message::WhereHas('conversion', function ($query) {
            return $query->where('client_id', Auth::guard('api')->user()->id);
        })->get();
        return  ChatResource::collection($messages);

    }
}
