<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id??'',
            "comment"=>$this->comment,
            "user_id"=>$this->user_id,
            "evalution"=>$this->evalution,
            "created_at"=>$this->created_at,
            "salesheader"=>$this->salesheader->id,
            "client_name"=>$this->salesheader->user->client_name,
            "client_phone"=>$this->salesheader->user->client_fhonewhats
        ];
    }
}
