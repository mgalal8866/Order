<?php

namespace App\Http\Livewire\Front\Product;

use App\Models\Category;
use App\Models\ProductDetails;
use Livewire\Component;

class Home extends Component
{   public $data =[];
    public function render()
    {   $categorys = Category::get();
        $products  = ProductDetails::with('productheader')->with('unit')->get();
        $this->data =['categorys'=>$categorys,'products'=>$products];
// dd($this->data[''] );
        return view('livewire.front.product.home')->layout('layouts.front-end.layout');
    }
}
