<?php

namespace App\Http\Resources;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SalesResource extends JsonResource
{

    public function toArray(Request $request): array
    {


        // return parent::toArray($request);
        return [
                'id'            => $this->id ??'',
                'invoicenumber' => $this->invoicenumber??'',
                'invoicetype'   => ($this->invoicetype == 1) ?'مرتجع':'مبيعات',
                'invoicedate'   => Carbon::parse($this->invoicedate)->translatedFormat('l j F Y') ?? '',
                'paytayp'       => $this->paytayp ??'',
                'status'        => $this->status??'',
                'subtotal'      => $this->subtotal??'',
                'totaldiscount' => $this->totaldiscount ??'',
                'total_add_amount' => $this->total_add_amount??'',
                'grandtotal'     => $this->grandtotal??'',
                'paid'           => $this->paid??'',
                'remaining'      => $this->remaining??'',
                'note'           => $this->note??'',
                'deliverycost'   => $this->deliverycost??'',
                'type_order'     => $this->type_order??'',
                'comment'        => $this->comment->comment??'',
                'rating'         => $this->comment->evalution??'',
                // 'satus_delivery' => $this->satus_delivery??'',
                // 'created_at'     => $this->created_at??'',
                // 'discount_g'    => $this->discount_g??'',
                // 'discount_f'    => $this->discount_f??'',
                // 'discount_sales' => $this->discount_sales??'',
                // 'discount_point' => $this->discount_point??'',
                // 'discount_product' => $this->discount_product??'',
                // 'add_amount_g'  => $this->add_amount_g??'',
                // 'add_amount_f'  => $this->add_amount_f??'',
                // 'coupon_id'     => $this->coupon_id??'',
                // 'client_id'     => $this->client_id??'',
                // 'lastbalance'   => $this->lastbalance??'',
                // 'finalbalance'  => $this->finalbalance??'',
                // 'user_id'       => $this->user_id??'',
                // 'store_id'      => $this->store_id??'',
                // 'safe_id'       => $this->safe_id??'',
                // 'employ_id'     => $this->employ_id??'',
                // 'dis_point_active' => $this->dis_point_active ??'',
                // 'total_profit'   => $this->total_profit??'',
        ];
    }
}
