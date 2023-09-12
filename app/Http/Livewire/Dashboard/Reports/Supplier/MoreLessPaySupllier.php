<?php

namespace App\Http\Livewire\Dashboard\Reports\Supplier;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Supplier;

class MoreLessPaySupllier extends Component
{
    public  $supplierspayments = [], $supplierslist = [], $suppliers = [], $fromdate, $todate, $exportdata = [], $selected = "";
    protected $listeners = ['selectedItem'];
    public function selectedItem($item = null)
    {
        $this->selected = $item;
    }

    public function mount()
    {
        $this->fromdate     =  Carbon::now()->startOfMonth()->format('Y/m/d');
        $this->todate       =  Carbon::now()->endOfMonth()->format('Y/m/d');
        $this->supplierslist    = Supplier::get();
    }
    public function render()
    {
        $this->suppliers        = Supplier::with('purchaseheader')->when($this->selected, function ($q) {
            if (!empty($this->selected)) {
                $q->where('id', $this->selected);
            }
        })->whereBetween('created_at', [$this->fromdate, $this->todate])->get();

        $this->exportdata =  $this->suppliers->map(function ($data) {
            return  [
                trans('tran.supplier_name')  => $data->Supplier_name ?? 'N/A'  ,
                trans('tran.purchases')      => $data->purchaseheader()->Countpurchase()?? 'N/A',
                trans('tran.valuepurchases') => $data->purchaseheader()->Sumpurchase()?? 'N/A',
                trans('tran.returned')       => $data->purchaseheader()->Countreturned()?? 'N/A',
                trans('tran.valuereturned')  => $data->purchaseheader()->Sumreturned()?? 'N/A',
            ];
        });
        $this->emit('export_button', $this->exportdata);
        return view('livewire.dashboard.reports.supplier.more-less-pay-supllier');
    }
}
