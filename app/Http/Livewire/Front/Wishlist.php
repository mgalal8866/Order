<?php

namespace App\Http\Livewire\Front;

use App\Models\ProductDetails;
use App\Models\Wishlist as ModelsWishlist;
use Livewire\Component;

class Wishlist extends Component
{
    public function removewishlist($id)
    {
        ModelsWishlist::where('product_id',$id)->delete();
    }

    public function render()
    {
        $wish = ProductDetails::whereHas('wishlist',function ($q) {
            // return   $q->where('user_id',1);
        })->with('unit')->with('productheader')->get();
        return view('livewire.front.wishlist',['wish'=>$wish])->layout('layouts.front-end.layout');

    }
}
