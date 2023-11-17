<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\ResourceCollection;


class BrandResource extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            'id'              => $this->id??'',
            'name'            => $this->name ?? ''
        ];
    }
}
