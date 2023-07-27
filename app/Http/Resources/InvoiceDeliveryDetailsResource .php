<?php

namespace App\Http\Resources;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\InvoiceDeliveryDetailsResourcelvl2;

class InvoiceDeliveryDetailsResource  extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'header' => [
                'subtotal'         => $this->subtotal ?? '',
                'totaldiscount'    => $this->totaldiscount ?? '',
                'total_add_amount' => $this->total_add_amount ?? '',
                'deliverycost'     => $this->deliverycost ?? '',
                'grandtotal'       => $this->grandtotal ?? '',
                'paid'             => $this->paid ?? '',
                'remaining'        => $this->remaining ?? '',
                'paytayp'          => $this->paytayp ??'',
            ],
            'details' =>InvoiceDeliveryDetailsResourcelvl2::collection($this->salesdetails),
        ];
    }
}
