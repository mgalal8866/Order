<?php

namespace App\Http\Livewire\Dashboard\Reports\Client;

use App\Models\ClientPayments;
use Carbon\Carbon;
use Livewire\Component;

class ClientPayed extends Component
{
    public $clientpay_id, $clientpayments, $exportdata, $fromdate, $todate;
    public function mount($id)
    {
        $this->clientpay_id = $id;
        $this->fromdate     =  Carbon::now()->startOfMonth()->format('Y/m/d');
        $this->todate       =  Carbon::now()->endOfMonth()->format('Y/m/d');
    }

    public function render()
    {
        $this->clientpayments = ClientPayments::with('clientpay_source')->whereBetween('created_at', [$this->fromdate, $this->todate])->where('clientpay_id', $this->clientpay_id)->get();
        $this->exportdata =  $this->clientpayments->map(function ($data) {
            return  [
                'اسم العميل'    => $data->clientpay_source->client_name,
                'التاريخ'       => $data->created_at->format('Y/m/d'),
                'رصيد سابق'     => $data->fromeamount,
                'مدفوع'         => $data->paidamount,
                'رصيد حالى'     => $data->newamount,
                'طريقة الدفع'   => $data->payment_method,
            ];
        });
        $this->emit('export_button', $this->exportdata);
        return view('livewire.dashboard.reports.client.client-payed');
    }
}
