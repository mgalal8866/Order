<?php

namespace App\Http\Livewire\Dashboard\Reports\Client;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\ClientPayments;

class AccountStatement extends Component
{
    public $clientpayments=[],$users, $userid, $fromdate, $todate, $exportdata = [], $selected="";

    protected $listeners = ['selectedItem'];
    public function selectedItem($item = null)
    {
        $this->selected = $item;

    }

    public function updateSelected()
    {
    }
    public function getstatement()
    {
    }
    public function mount()
    {
        $this->fromdate     =  Carbon::now()->startOfMonth()->format('Y/m/d');
        $this->todate       =  Carbon::now()->endOfMonth()->format('Y/m/d');
    }

    public function render()
    {
        if(!empty($this->selected )){
            $this->clientpayments = ClientPayments::with('clientpay_source')->whereBetween('created_at', [$this->fromdate, $this->todate])->where('clientpay_id', $this->selected)->get();
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
        }


        $this->users = User::get();
        return view('livewire.dashboard.reports.client.account-statement');
    }
}
