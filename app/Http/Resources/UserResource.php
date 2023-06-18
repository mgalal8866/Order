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
                'categoryAPP'       =>$this->categoryAPP,
                'access_token'      =>$this->token,
                'token_type'        =>'bearer',
                'Setting'           =>[
                    'name_shop'         =>$this->name_shop??'',
                    'maneger_phone'     =>$this->maneger_phone??'',
                    'phone_shop'        =>$this->phone_shop??'',
                    'address_shop'      =>$this->address_shop??'',
                    'logo_shop'         =>$this->logo_shop??'',
                    'message_report'    =>$this->message_report??'',
                    'delivery_amount'   =>$this->delivery_amount??'',
                    'delivery_message'  =>$this->delivery_message??'',
                    'salesstatus'       =>$this->salesstatus??'',
                    'point_system'      =>$this->point_system??'',
                    'point_price'       =>$this->point_price??'',
                    'point_le'          =>$this->point_le??'',
                    'region_id'         =>$this->region_id??'',
                    'city_id'           =>$this->city_id??'',
                    'country_id'        =>$this->country_id??'',
                    'supcategory_id'    =>$this->supcategory_id??'',
                    'type_of_goods'     =>$this->type_of_goods??'',
                    'delivery_though'   =>$this->delivery_though??'',
                    'minimum_products'  =>$this->minimum_products??'',
                    'minimum_financial' =>$this->minimum_financial??'',
                    'deferred_sale'     =>$this->deferred_sale??'',
                    'low_profit'        =>$this->low_profit??''
                ]
        ];
    }
}
