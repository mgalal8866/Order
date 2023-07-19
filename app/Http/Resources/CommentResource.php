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
            "comment"=>$this->id??'',
            "comment"=>$this->comment,
            "user_id"=>$this->user_id,
            "evalution"=>$this->evalution,
            "created_at"=>$this->null,
            "salesheader"=>$this->salesheader->id
        ];
    }
}
