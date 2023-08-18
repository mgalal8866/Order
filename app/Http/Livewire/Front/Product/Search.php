<?php

namespace App\Http\Livewire\Front\Product;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductDetails;

class Search extends Component
{
    use WithPagination;

    public $search =null;
    
    public function render()
    {

        // $search = $this->search;
        // if($search != ''){

        //     $results = ProductDetails::where('productd_barcode', 'like',   $search)
        //     ->orWhereHas('productheader', function ($query) use ($search) {
        //         return $query->where('product_name', 'like', '%' .   $search . '%')->online();
        //     })->online()
        //     ->paginate($this->pag);
        // }else{
        //     $results = [];
        // }
        return view('livewire.front.product.search')->layout('layouts.front-end.layout');

    }
}
