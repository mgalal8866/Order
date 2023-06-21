<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id'            => $this->id,
            'code'          => $this->code,
            'name'          => $this->name,
            'value'         => $this->value,
            'min_invoce'    => $this->min_invoce,
            'type'          => $this->type == 0 ?  'F' : 'P'

        ];
    }
}
