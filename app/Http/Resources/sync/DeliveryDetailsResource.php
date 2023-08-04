<?php

namespace App\Http\Resources\sync;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryDetailsResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

              'id'=>$this->id,
              'sale_header_id' =>$this->sale_header_id,
              'product_details_id' =>$this->product_details_id,
              'buyprice' =>$this->buyprice,
              'sellprice' =>$this->sellprice,
              'quantity' =>$this->quantity,
              'subtotal' =>$this->subtotal,
              'discount' =>$this->discount,
              'grandtotal' =>$this->grandtotal,
              'profit' =>$this->profit,
              'created_at' =>$this->created_at,
              'lastsyncdate' =>$this->lastsyncdate,
              'updated_at' =>$this->updated_at,


        ];
    }
}
