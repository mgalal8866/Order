<?php

namespace App\Http\Livewire\Dashboard\Reports\Supplier;

use App\Models\Supplier;
use App\Models\SupplierPayments;
use Carbon\Carbon;
use Livewire\Component;

class SupplierPayed extends Component
{
    public $username, $Supplierpay_id, $supplierpayments, $exportdata, $fromdate, $todate;
    public function mount($id)
    {
        $this->Supplierpay_id = $id;
        $this->username = Supplier::where('id', $id)->first()->Supplier_name;
        $this->fromdate     =  Carbon::now()->startOfMonth()->format('Y/m/d');
        $this->todate       =  Carbon::now()->endOfMonth()->format('Y/m/d');
    }
    public function render()
    {

        $this->supplierpayments = SupplierPayments::whereBetween('created_at', [$this->fromdate, $this->todate])->where('SupplierPay_Id', $this->Supplierpay_id)->get();
        $this->exportdata =  $this->supplierpayments->map(function ($data) {
            return  [
                'اسم المورد'    => $data->Supplier_name,
                'التاريخ'       => $data->created_at->format('Y/m/d'),
                'رصيد سابق'     => $data->FromeAmount,
                'مدفوع'         => $data->PaidAmount,
                'رصيد حالى'     => $data->NewAmount,
                'طريقة الدفع'   => $data->Payment_method,
            ];
        });
        $this->emit('export_button', $this->exportdata);
        return view('livewire.dashboard.reports.supplier.supplier-payed');
    }
}
