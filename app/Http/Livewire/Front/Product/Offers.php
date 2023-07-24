<?php

namespace App\Http\Livewire\Front\Product;

use Livewire\Component;
use App\Models\ProductDetails;

class Offers extends Component
{
    public $data =[] ;
    public function render()
    {
        $offers  = ProductDetails::Getoffers()->with('productheader')->with('unit')->with('cart')->paginate(20);

        $this->data =[ 'offers'=>$offers ];

        return view('livewire.front.product.offers')->layout('layouts.front-end.layout');
    }
}
