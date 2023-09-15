<?php

namespace App\Http\Livewire\Dashboard\Reports\Pos;

use App\Models\Employee;
use App\Models\Shift;
use App\Models\userdesck;
use Carbon\Carbon;
use Livewire\Component;


class ShiftReport extends Component
{
    public $username= ' ', $shifts=[],  $userdesck, $fromdate, $todate, $exportdata = [], $selected = "";
    protected $listeners = ['selectedItem'];
    public function selectedItem($item = null)
    {
        $this->selected = $item;
    }
    public function mount()
    {
        $this->fromdate     =  Carbon::now()->startOfMonth()->format('Y/m/d');
        $this->todate       =  Carbon::now()->endOfMonth()->format('Y/m/d');
        $this->userdesck        =  userdesck::get();
    }
    public function render()
    {
        $this->shifts= Shift::where('UserId', $this->selected)->whereBetween('created_at', [$this->fromdate, $this->todate])->get();
        $this->username =  count($this->shifts)>0 ?$this->shifts[0]->userdesck->user_name:'';
        $this->exportdata      = $this->shifts->map(function ($data) {
            return  [
              trans('tran.namesafe')            => $data->safe->safe_name ,
              trans('tran.start_shift')         => $data->StartDate,
              trans('tran.balance')             => $data->FirstBalance,
              trans('tran.sales')               => $data->totalSaels,
              trans('tran.returns')             => $data->totalRetrnSaels,
              trans('tran.purchases')           => $data->totalPorshes,
              trans('tran.returns_purchases')   => $data->totalRetrnProsh,
              trans('tran.advance')             => $data->totalSalfeat,
              trans('tran.revenues')            => $data->TotalIncome,
              trans('tran.expenses')            => $data->TotalExprte,
              trans('tran.end_shift')           => $data->EndDate,
              trans('tran.final_balance')       => $data->LastBalance,


            ];
        });
        $this->emit('export_button', $this->exportdata);
        return view('livewire.dashboard.reports.pos.shift-report');
    }
}
