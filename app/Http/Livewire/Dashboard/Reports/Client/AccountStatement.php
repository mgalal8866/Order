<?php

namespace App\Http\Livewire\Dashboard\Reports\Client;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\SalesHeader;
use App\Models\ClientPayments;
use Illuminate\Support\Facades\DB;

class AccountStatement extends Component
{
    public $username, $clientpayments = [], $users, $userid, $fromdate, $todate, $exportdata = [], $selected = "";

    protected $listeners = ['selectedItem'];
    public function selectedItem($item = null)
    {
        $this->selected = $item;
    }
    public function mount()
    {
        $this->fromdate     =  Carbon::now()->startOfMonth()->format('Y/m/d');
        $this->todate       =  Carbon::now()->endOfMonth()->format('Y/m/d');
        $this->users = User::get();
    }
    public function render()
    {
        if (!empty($this->selected)) {
            $use = User::where('source_id', $this->selected)->first();
           if($use != null) {$this->username= $use->client_name;};
            $a = SalesHeader::where('client_id', $this->selected)->whereBetween('created_at', [$this->fromdate, $this->todate])->select(
                'invoicedate as date', //التاريخ
                'invoicetype', // نوع_العملية
                'lastbalance', //الرصيد_السابق
                'paid', //المدفوع
                'finalbalance', //الرصيد_النهائى
                'grandtotal' // قيمة_العملية
            );
            $b = ClientPayments::where('clientpay_id', $this->selected)->whereBetween('created_at', [$this->fromdate, $this->todate])->select(
                'created_at as date',
                'payment_method',
                'fromeamount',
                'paidamount',
                'newamount',
                DB::raw("'_' as grandtotal")
            );
           $this->clientpayments  = $b->union($a)->orderBy('date', 'DESC')->get();
           $this->exportdata      = $this->clientpayments->map(function ($data) {
                return  [
                    'اسم العميل'    => $this->username,
                    'التاريخ'       => Carbon::parse($data->date)->format('Y/m/d'),
                    'رصيد سابق'     => $data->fromeamount,
                    'مدفوع'         => $data->paidamount,
                    'رصيد حالى'     => $data->newamount,
                    'قيمه العملية'  => $data->grandtotal,
                    'نوع العملية'   => $data->payment_method == '0' ? "مبيعات" : ($data->payment_method == '1' ? "مرتجع" :  $data->payment_method),
                ];
            });
            $this->emit('export_button', $this->exportdata);
        }else{
            $this->clientpayments=[];
            $this->exportdata =[];
        }
        return view('livewire.dashboard.reports.client.account-statement');
    }
}
