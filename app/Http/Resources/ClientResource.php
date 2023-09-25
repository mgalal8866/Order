<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id'                => $this->id,
            'client_name'       => $this->client_name,
            'client_code'       => $this->client_code ?? '',
            'client_fhonewhats' => $this->client_fhonewhats ?? '',
            'client_fhoneLeter' => $this->client_fhoneLeter ?? '',
            'client_balanc'     => $this->client_Balanc ?? '',
            'client_EntiteNumber' => $this->client_EntiteNumber ?? '',
            'client_points'     => $this->client_points ?? '',
            'default_Sael'      => $this->default_Sael ?? '',
            'client_Credit_Limit' => $this->client_Credit_Limit ?? '',
            'region_id'         => $this->region_id ?? '',
            'city_name'           => $this->region->city->name ?? '',
            'city_id'           => $this->region->city_id ?? '',
            'store_name'        => $this->store_name ?? '',
            'lat_mab'           => $this->lat_mab ?? '',
            'long_mab'          => $this->long_mab ?? '',
            'client_state'      => $this->client_state ?? '',
            'client_Active'      => $this->client_Active ?? '',
            'categoryAPP'       => $this->categoryAPP ?? '',
             
        ];
    }
}
