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
        if($search != ''){

            $results = ProductDetails::where('productd_barcode', 'like',   $search)
            ->orWhereHas('productheader', function ($query) use ($search) {
                return $query->where('product_name', 'like', '%' .   $search . '%')->online();
            })->online()
            ->paginate($this->pag);
        }else{
            $results = [];
        }
        return view('livewire.front.product.searchproduct',['results'=>$results])->layout('layouts.front-end.layout');

    }
}
