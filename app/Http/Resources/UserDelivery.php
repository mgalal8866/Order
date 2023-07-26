<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDelivery extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            =>$this->id,
            'name'          =>$this->employee->name??'',
            'region_id'     =>$this->employee->region_id??'',
            'region_name'   =>$this->employee->region->name??'',
            'city_name'     =>$this->employee->region->city->name??'',
            'lat'           =>$this->lat??'',
            'long'          =>$this->long??''
        ];
    }
}
