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
            "client_id"             => $this->client_id ?? null,
            "message_id"            => $this->id,
            // "admin_id"              => "",
            "admin_id"              => (string) $this->admin_id,
            "message"               => $this->message ?? '',
            "seen"                  => $this->seen,
            "sendername"            => $this->user->client_name ??   $this->admin->employee->name,
            "datetime"              => Carbon::parse($this->created_at)->translatedFormat('H:i A / m-d-Y') ?? '',
            "created_at"            => $this->created_at?? '',
        ];
    }
}
