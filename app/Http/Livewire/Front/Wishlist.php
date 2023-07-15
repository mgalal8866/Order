<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist as ModelsWishlist;

class Wishlist extends Component
{
    public function removewishlist($id)
    {
        ModelsWishlist::where('product_id',$id)->delete();
    }

    public function render()
    {
        $wish = ProductDetails::whereHas('wishlist',function ($q) {
            return  $q->where('user_id',Auth::guard('client')->user()->id);
        })->with('unit')->with('productheader')->get();
        return view('livewire.front.wishlist',['wish'=>$wish])->layout('layouts.front-end.layout');

    }
}
