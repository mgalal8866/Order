<?php

namespace App\Http\Livewire\Dashboard\Reports\Supplier;

use App\Models\PurchaseHeader;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\SalesHeader;
use App\Models\Supplier;
use App\Models\SupplierPayments;
use Illuminate\Support\Facades\DB;

class SupAccountStatement extends Component
{
    public $username, $supplierspayments = [], $suppliers, $fromdate, $todate, $exportdata = [], $selected = "";

    protected $listeners = ['selectedItem'];
    public function selectedItem($item = null)
    {
        $this->selected = $item;

    }


    public function mount()
    {
        $this->fromdate     =  Carbon::now()->startOfMonth()->format('Y/m/d');
        $this->todate       =  Carbon::now()->endOfMonth()->format('Y/m/d');
        $this->suppliers = Supplier::get();
    }
    public function render()
    {

        if (!empty($this->selected)) {
            $use= Supplier::where('id', $this->selected)->first()->Supplier_name;
           
            if($use != null) {$this->username= $use->Supplier_name;};
            $a = PurchaseHeader::where('Suppliers_id', $this->selected)->whereBetween('created_at', [$this->fromdate, $this->todate])->select(
                'created_at as date', //التاريخ
                'InvoiceType', // نوع_العملية
                'Suppliers_Last_balance', //الرصيد_السابق
                'Paid', //المدفوع
                'Suppliers_Final_balance', //الرصيد_النهائى
                'Grand_Total' // قيمة_العملية
            );
            $b = SupplierPayments::where('SupplierPay_Id', $this->selected)->whereBetween('created_at', [$this->fromdate, $this->todate])->select(
                'created_at as date',
                'Payment_method',
                'FromeAmount',
                'PaidAmount',
                'NewAmount',
                DB::raw("'_' as Grand_Total")
            );
            $this->supplierspayments  = $b->union($a)->orderBy('date', 'DESC')->get();
            $this->exportdata      = $this->supplierspayments->map(function ($data) {
                return  [
                    'اسم المورد'    => $this->username,
                    'التاريخ'       => Carbon::parse($data->date)->format('Y/m/d'),
                    'رصيد سابق'     => $data->FromeAmount,
                    'مدفوع'         => $data->PaidAmount,
                    'رصيد حالى'     => $data->NewAmount,
                    'قيمه العملية'     => $data->Grand_Total,
                    'نوع العملية'   => $data->Payment_method == '0' ? "مبيعات" : ($data->Payment_method == '1' ? "مرتجع" :  $data->Payment_method),
                ];
            });
            $this->emit('export_button', $this->exportdata);
        }else{
            $this->supplierspayments  = [];
            $this->exportdata=[];
        }




        return view('livewire.dashboard.reports.supplier.sup-account-statement');
    }
}
