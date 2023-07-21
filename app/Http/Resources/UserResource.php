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
            'city_id'           => $this->region->city->name ?? '',
            'store_name'        => $this->store_name ?? '',
            'lat_mab'           => $this->lat_mab ?? '',
            'long_mab'          => $this->long_mab ?? '',
            'client_state'      => $this->client_state ?? '',
            'client_Active'      => $this->client_Active ?? '',
            'categoryAPP'       => $this->categoryAPP ?? '',
            'access_token'      => $this->token ?? '',
            'token_type'        => 'bearer',
            'Setting'           => $this['setting']?[
                'name_shop'         => $this['setting']['name_shop'] ?? '',
                'maneger_phone'     => $this['setting']['maneger_phone'] ?? '',
                'phone_shop'        => $this['setting']['phone_shop'] ?? '',
                'address_shop'      => $this['setting']['address_shop'] ?? '',
                'logo_shop'         => $this['setting']['logo_shop'] ?? '',
                'message_report'    => $this['setting']['message_report'] ?? '',
                'delivery_amount'   => $this['setting']['delivery_amount'] ?? '',
                'delivery_message'  => $this['setting']['delivery_message'] ?? '',
                'salesstatus'       => $this['setting']['salesstatus'] ?? '',
                'point_system'      => $this['setting']['point_system'] ?? '',
                'point_price'       => $this['setting']['point_price'] ?? '',
                'point_le'          => $this['setting']['point_le'] ?? '',
                'region_id'         => $this['setting']['region_id'] ?? '',
                'city_id'           => $this['setting']['city_id'] ?? '',
                'country_id'        => $this['setting']['country_id'] ?? '',
                'supcategory_id'    => $this['setting']['supcategory_id'] ?? '',
                'type_of_goods'     => $this['setting']['type_of_goods'] ?? '',
                'delivery_though'   => $this['setting']['delivery_though'] ?? '',
                'minimum_products'  => $this['setting']['minimum_products'] ?? '',
                'minimum_financial' => $this['setting']['minimum_financial'] ?? '',
                'deferred_sale'     => $this['setting']['deferred_sale'] ?? '',
                'low_profit'        => $this['setting']['low_profit'] ?? ''
            ]:''
        ];
    }
}
