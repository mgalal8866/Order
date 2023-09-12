<?php

namespace App\Http\Livewire\Dashboard\Reports\Product;

use App\Models\ProductDetails;
use Carbon\Carbon;
use Livewire\Component;

class Moreandlesssale extends Component
{
    public  $productspayments = [], $productlist = [], $products = [], $fromdate, $todate, $exportdata = [], $selected = "";
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
        $this->products        = ProductDetails::with('unit')->when('salesdetails', function ($qq) {
            $qq->whereBetween('created_at', [$this->fromdate, $this->todate]);
            // $qq->whereBetween('created_at', [$this->fromdate, $this->todate])->orderBy('sales_details.quantity', 'DESC');
        })->when($this->selected, function ($q) {
            if (!empty($this->selected)) {
                $q->where('id', $this->selected);
            }
        })->get();
        $this->exportdata =  $this->products->map(function ($data) {
            return  [

                trans('tran.product')  => $data->productheader->product_name ?? 'N/A' ,
                // trans('tran.product')  => $data->productheader->product_name ?? 'N/A' . ' ' . $data->unit->unit_name ?? 'N/A',
                trans('tran.qty')   => $data->salesdetails->sum('quantity') ?? 'N/A',

            ];
        });
        $this->emit('export_button', $this->exportdata);
        return view('livewire.dashboard.reports.product.moreandlesssale');
    }
}
