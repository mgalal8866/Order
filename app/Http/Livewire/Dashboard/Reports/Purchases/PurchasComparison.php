<?php

namespace App\Http\Livewire\Dashboard\Reports\Purchases;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\ProductDetails;
use App\Models\PurchaseDetails;

class PurchasComparison extends Component
{
    public  $purchasedetails = [], $productlist = [], $fromdate, $todate, $exportdata = [], $selected = "";
    protected $listeners = ['selectedItem'];
    public function selectedItem($item = null)
    {
        $this->selected = $item;
    }

    public function mount()
    {
        $this->fromdate     =  Carbon::now()->startOfMonth()->format('Y/m/d');
        $this->todate       =  Carbon::now()->endOfMonth()->format('Y/m/d');
        $this->productlist    = ProductDetails::with('unit')->with('productheader')->get();
    }
    public function render()
    {

        $this->purchasedetails = PurchaseDetails::whereHas('purchaseheader', function ($q) {
            $q->with('supplier')->whereBetween('created_at', [$this->fromdate, $this->todate]);
        })->where('Product_Details_Id', $this->selected)->orderBy('BuyPrice', 'asc')->get();
        $this->exportdata =  $this->purchasedetails->map(function ($data) {
            return  [
                trans('tran.name_supplier')  => $data->purchaseheader->supplier->Supplier_name ?? 'N/A',
                trans('tran.action_type')  => $data->purchaseheader->InvoiceType == 0 ? 'مشتريات' : 'مرتجع' ?? 'N/A',
                trans('tran.lass_price')  => $data->BuyPrice ?? 'N/A',
                trans('tran.date_buy')  => $data->created_at ?? 'N/A',
            ];
        });
        $this->emit('export_button', $this->exportdata);
        return view('livewire.dashboard.reports.purchases.purchas-comparison');
    }
}
