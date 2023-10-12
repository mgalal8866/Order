<?php

namespace App\Http\Livewire\Dashboard\Reports\Purchases;

use App\Models\PurchaseHeader;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Supplier;

class PurchasesReturned extends Component
{
    public $selected, $suppliers,  $purchases, $exportdata = [], $fromdate, $todate;

    protected $listeners = ['selectedItem'];
    public function selectedItem($item = null)
    {
        $this->selected = $item;
    }

    public function mount()
    {

        $this->suppliers = Supplier::get();
        $this->fromdate     =  Carbon::now()->startOfMonth()->format('Y/m/d');
        $this->todate       =  Carbon::now()->endOfMonth()->format('Y/m/d');
    }
    public function render()
    {
        $this->purchases = PurchaseHeader::where('InvoiceType', 1)->when($this->selected, function ($q) {
            if (!empty($this->selected)) {
                $q->where('Suppliers_id', $this->selected);
            }
        })->whereBetween('created_at', [$this->fromdate, $this->todate])->get();

        $this->exportdata      = $this->purchases->map(function ($data) {
            return  [
                trans('tran.num_invo')    =>  $data->invoice_Number,
                trans('tran.name_supplier')    => $data->supplier->Supplier_name,
                trans('tran.date')    => Carbon::parse($data->created_at)->format('Y/m/d'),
                trans('tran.total')    => $data->Grand_Total,

            ];
        });
        $this->emit('export_button', $this->exportdata);
        return view('livewire.dashboard.reports.purchases.purchases-returned');
    }
}