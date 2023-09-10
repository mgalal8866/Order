<?php

namespace App\Http\Livewire\Dashboard\Reports\Client;

use App\Models\ClientPayments;
use Livewire\Component;

class ClientPayed extends Component
{
    public $id;
    public function mount($id){
        ClientPayments::where('clientpay_id',$id)->get();
    }
    public function render()
    {
        return view('livewire.dashboard.reports.client.client-payed');
    }
}
