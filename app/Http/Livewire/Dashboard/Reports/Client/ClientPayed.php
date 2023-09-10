<?php

namespace App\Http\Livewire\Dashboard\Reports\Client;

use App\Models\ClientPayments;
use Livewire\Component;

class ClientPayed extends Component
{
    public $clientpay_id, $clientpayments,$exportheader,$exportdata ,$fromdate ,$todate;
    public function mount($id){
        $this->clientpay_id = $id;
        $this->todate = $id;
        $this->fromdate = $id;
    }

    public function render()
    {
        $this->clientpayments = ClientPayments::with('clientpay_source')->whereBetween('created_at',[$this->fromdate,$this->fromdate])-> where('clientpay_id', $this->clientpay_id )->get();

        return view('livewire.dashboard.reports.client.client-payed');
    }
}
