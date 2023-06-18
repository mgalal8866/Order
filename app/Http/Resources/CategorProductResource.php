<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategorProductResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'             =>$this->id,
            'category_name'  =>$this->category_name??'',
            'image'          =>$this->image??''
        ];
    }
}

