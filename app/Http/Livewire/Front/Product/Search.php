<?php

namespace App\Http\Livewire\Front\Product;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductDetails;

class Search extends Component
{
    use WithPagination;
    public $search =null;
    public function searchget() {
        return redirect()->to('/product/search/'. $this->search);
    }

    public function render()
    {
        return view('livewire.front.product.search')->layout('layouts.front-end.layout');
    }
}
