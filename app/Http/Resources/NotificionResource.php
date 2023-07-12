<?php

namespace App\Http\Resources;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificionResource extends JsonResource
{

    public function toArray(Request $request): array
    {


        // return parent::toArray($request);
        return [
            'id'        => $this->id,
            'body'      => $this->body,
            'title'     => $this->title,
            'created_at' => $this->created_at
        ];
    }
}
