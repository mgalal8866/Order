<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

use Illuminate\Http\Request;
class BrandResource extends JsonResource
{

    public function toArray(Request $request)
    {
        return [
            'id'              => $this->id??'',
            'name'            => $this->name ?? ''
        ];
    }
}
