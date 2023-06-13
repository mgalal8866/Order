<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[

                'id'                =>$this->id,
                'client_name'       =>$this->client_name,
                'client_code'       =>$this->client_code,
                'client_fhonewhats' =>$this->client_fhonewhats,
                'client_fhoneLeter' =>$this->client_fhoneLeter,
                'region_id'         =>$this->region_id,
                'lat_mab'           =>$this->lat_mab,
                'long_mab'          =>$this->long_mab,
                'client_state'      =>$this->client_state,
                'CategoryAPP'       =>$this->CategoryAPP,
                'access_token'      =>$this->token,
                'token_type'        =>'bearer',
        ];
    }
}
