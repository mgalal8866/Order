<?php

namespace App\Http\Resources\sync;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\sync\DeliveryDetailsResource;


class DeliveryHeaderResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

                'id'           => $this->id  ?? '',
                'invoicenumber' => $this->invoicenumber,
                'coupon_id' => $this->coupon_id,
                'type_order' => $this->type_order,
                'comment_id' => $this->comment_id,
                'invoicetype' => $this->invoicetype,
                'invoicedate' => $this->invoicedate,
                'client_id' => $this->user->source_id??'',
                'lastbalance' => $this->lastbalance,
                'finalbalance' => $this->finalbalance,
                'user_id' => $this->user_id,
                'store_id' => $this->store_id,
                'safe_id' => $this->safe_id,
                'status' => $this->status,
                'employ_id' => $this->employ_id,
                'dis_point_active' => $this->dis_point_active,
                'paytayp' => $this->paytayp,
                'subtotal' => $this->subtotal,
                'totaldiscount' => $this->totaldiscount,
                'discount_g' => $this->discount_g,
                'discount_f' => $this->discount_f,
                'total_add_amount' => $this->total_add_amount,
                'add_amount_g' => $this->add_amount_g,
                'add_amount_f' => $this->add_amount_f,
                'discount_product' => $this->discount_product,
                'discount_sales' => $this->discount_sales,
                'discount_point' => $this->discount_point,
                'grandtotal' => $this->grandtotal,
                'paid' => $this->paid,
                'remaining' => $this->remaining,
                'total_profit' => $this->total_profit,
                'note' => $this->note,
                'deliverycost' => $this->deliverycost,
                'satus_delivery' => $this->satus_delivery,
                'sales_online' => $this->sales_online,
                'created_at' => $this->created_at,
                'lastsyncdate' => $this->lastsyncdate,
                'updated_at'      => $this->updated_at,
                'salesdetails' =>DeliveryDetailsResource::collection($this->salesdetails),
        ];
    }
}
