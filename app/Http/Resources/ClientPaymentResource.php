<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Jenssegers\Date\Date;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientPaymentResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        // Carbon::setLocale('ar');

        return [
            'id'             => $this->id,
            'clientpay_id'   => $this->clientpay_id,
            'fromeamount'    => $this->fromeamount ?? '',
            'paidamount'     => $this->paidamount ?? '',
            'newamount'      => $this->newamount ?? '',
            'pay_note'       => $this->pay_note ?? '',
            'payment_method' => $this->payment_method ?? '',
            'created_at'     => Carbon::parse($this->created_at)->translatedFormat('l j F Y') ?? ''
        ];
    }
}
