<?php

namespace App\Http\Resources;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{


    public function toArray($request)
    {
        return [
            'id'      => $this->id,
            'message' => $this->message,
            'username'=> $this->user->name,
            'user_id' => $this->user_id,
            'isme'    => $this->getClass()
        ];
    }

    public function getClass()
    {
        return $this->user_id == auth()->id();
    }
}
