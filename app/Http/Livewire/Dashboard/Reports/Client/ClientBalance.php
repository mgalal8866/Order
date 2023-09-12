<?php

namespace App\Http\Livewire\Dashboard\Reports\Client;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;

class ClientBalance extends Component
{
    public $usersbalance=[],$users, $userid, $fromdate, $todate, $exportdata = [], $selected="";

    protected $listeners = ['selectedItem'];
    public function selectedItem($item = null)
    {
        $this->selected = $item;

    }
    public function mount()
    {
        $this->fromdate     =  Carbon::now()->startOfMonth()->format('Y/m/d');
        $this->todate       =  Carbon::now()->endOfMonth()->format('Y/m/d');
        $this->users        =  User::get();
    }

    public function render()
    {
        $this->usersbalance =   User::when($this->selected ,function($q){
            if(!empty($this->selected)){
                $q->where('id', $this->selected);
            }
        })->get();
        $this->exportdata = $this->usersbalance->map(function ($data) {
            return  [
                'اسم العميل' => $data->client_name,
                'رصيد'       => $data->client_Balanc == 0 ? "0" :$data->client_Balanc
            ];
        });
        $this->emit('export_button', $this->exportdata);
        return view('livewire.dashboard.reports.client.client-balance');
    }
}
