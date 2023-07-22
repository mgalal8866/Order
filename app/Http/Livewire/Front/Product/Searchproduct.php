<?php

namespace App\Http\Livewire\Front\Product;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductDetails;

class Searchproduct extends Component
{
    use WithPagination;

    public $search =null,$pag=30;
    public function render()
    {
        $search = $this->search;
        $results = ProductDetails::where('productd_barcode', 'LIKE',   $search)
            ->orWhereHas('productheader', function ($query) use ($search) {
                $query->where('product_name', 'LIKE', "%" .   $search . "%")->online();
            })->online()
            ->paginate($this->pag);
        return view('livewire.front.product.searchproduct',['results'=>$results])->layout('layouts.front-end.layout');

    }
}
