<?php

namespace App\Http\Livewire\Dashboard\Product;

use App\Models\ProductDetails;
use Livewire\Component;
use App\Models\products;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;

class ViewProduct extends Component
{
    use WithPagination;
    protected $listeners = ['view-product' => '$refresh'];
    protected $paginationTheme = 'bootstrap';
    public $pg = 30, $search;
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function demo()
    {
        $this->dispatchBrowserEvent('swal', ['message' => 'DEMO  version   ']);
    }

    public function render()
    {
        if ($this->search == '') {
            $products = ProductDetails::latest()->paginate($this->pg);
        } else {
            $rr = $this->search;
            $products = ProductDetails::where('productd_barcode', 'LIKE',  $this->search)
            ->orWhereHas('productheader', function ($query) use ($rr ) {
                $query->where('product_name', 'LIKE', "%" . $rr . "%");
            })->latest()->paginate($this->pg);
        }
        return view('livewire.dashboard.product.view-product', ['products' => $products]);
    }
}
