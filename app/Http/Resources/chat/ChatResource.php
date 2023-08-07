<?php

namespace App\Http\Resources\chat;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{

    public function toArray(Request $request): array
    {

        return [
            "conversions_id"        => $this->conversions_id,
            "client_id"             => $this->client_id ??  '',
            "message_id"            => $this->id,
            "admin_id"              => $this->admin_id??'',
            "message"               => $this->message ?? '',
            "seen"                  => $this->seen,
            "sendername"            => $this->user->client_name ?? 'admin -'. $this->admin->username,
            "datetime"              => $this->created_at ?? '',
        ];
    }
}
