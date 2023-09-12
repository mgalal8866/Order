<?php

namespace App\Http\Livewire\Dashboard\Reports\Supplier;

use App\Models\Supplier;
use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;

class SupplierBalance extends Component
{
    public $suppliersbalance = [], $suppliers, $userid, $fromdate, $todate, $exportdata = [], $selected = "";
    protected $listeners = ['selectedItem'];
    public function selectedItem($item = null)
    {
        $this->selected = $item;
    }
    public function mount()
    {
        $this->fromdate     =  Carbon::now()->startOfMonth()->format('Y/m/d');
        $this->todate       =  Carbon::now()->endOfMonth()->format('Y/m/d');
        $this->suppliers        =  Supplier::get();
    }
    public function render()
    {
        $this->suppliersbalance =   Supplier::when($this->selected, function ($q) {
            if (!empty($this->selected)) {
                $q->where('id', $this->selected);
            }
        })->get();

        $this->exportdata = $this->suppliersbalance->map(function ($data) {
            return  [
                'اسم المورد' => $data->Supplier_name,
                'رصيد'       => $data->Supplier_Balance == 0 ? "0" : $data->Supplier_Balance
            ];
        });
        $this->emit('export_button', $this->exportdata);
        return view('livewire.dashboard.reports.supplier.supplier-balance');
    }
}
