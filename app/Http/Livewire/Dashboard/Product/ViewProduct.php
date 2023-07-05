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


    public function demo()
    {
        $this->dispatchBrowserEvent('swal',['message'=>'DEMO  version   ' ]);
    }

    public function render()
    {
        $products = ProductDetails::latest()->paginate(4);
        return view('livewire.dashboard.product.view-product',['products' => $products]);
      }
}
