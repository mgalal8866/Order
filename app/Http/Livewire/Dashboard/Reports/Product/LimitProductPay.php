<?php

namespace App\Http\Livewire\Dashboard\Reports\Product;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\DB;

class LimitProductPay extends Component
{
    public $productlist = [], $products = [], $exportdata = [], $selected = "";
    protected $listeners = ['selectedItem'];
    public function selectedItem($item = null)
    {
        $this->selected = $item;
    }

    public function mount()
    {

        $this->productlist    = ProductDetails::with('unit')->with('productheader')->get();
    }

    public function render()
    {

        $d = ProductDetails::query();
        $d =  $d->where('id', 1)->with(['unit', 'productheader' => function ($q) {
            $q->with(['stock' => function ($qq) use ($q) {
                $qq->whereColumn('stocks.quantity', '>', 'product_limit');
            }]);
        }]);
        $d = $d->Tosql();
        dd($d);
        return view('livewire.dashboard.reports.product.limit-product-pay');
    }
}
