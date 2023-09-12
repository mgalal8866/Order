<?php

namespace App\Http\Livewire\Dashboard\Reports\Client;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;

class MoreAndLessPayClient extends Component
{
    public  $userspayments = [], $userslist = [], $users = [], $fromdate, $todate, $exportdata = [], $selected = "";
    protected $listeners = ['selectedItem'];
    public function selectedItem($item = null)
    {
        $this->selected = $item;
    }

    public function mount()
    {
        $this->fromdate     =  Carbon::now()->startOfMonth()->format('Y/m/d');
        $this->todate       =  Carbon::now()->endOfMonth()->format('Y/m/d');
        $this->userslist    = User::get();
    }
    public function render()
    {
        $this->users        = User::with('salesheader')->when($this->selected, function ($q) {
            if (!empty($this->selected)) {
                $q->where('id', $this->selected);
            }
        })->whereBetween('created_at', [$this->fromdate, $this->todate])->get();
        $this->exportdata =  $this->users->map(function ($data) {
            return  [

                trans('tran.namecustom')  => $data->client_name ?? 'N/A',
                trans('tran.purchases') => $data->salesheader()->Countpurchase() ?? 'N/A',
                trans('tran.valuepurchases') => $data->salesheader()->Sumpurchase() ?? 'N/A',
                trans('tran.returned') => $data->salesheader()->Countreturned() ?? 'N/A',
                trans('tran.valuereturned')    => $data->salesheader()->Sumreturned() ?? 'N/A', $data->clientpay_source->client_name,

            ];
        });
        $this->emit('export_button', $this->exportdata);
        return view('livewire.dashboard.reports.client.more-and-less-pay-client');
    }
}
