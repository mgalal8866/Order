<?php

namespace App\Http\Livewire\Front\Cart;

use App\Models\Cart;
use Livewire\Component;
use App\Models\ProductDetails;

class Headercart extends Component
{
    public  $cartlist = [],$count;
    public function removefromcart($id){

        Cart::where('product_id',$id)->delete();
    }
    public function render()
    {
        $c = Cart::with(['productdetails' => function($q) {
            $q->with('productheader')->with('unit');
        }])->get();

        // $c = ProductDetails::whereHas('cart',function ($q) {
        //     // return   $q->where('user_id',1);
        // })->with('unit')->with('cart')->with('unit')->with('productheader')->get();

        $this->count =$c->count();
        $this->cartlist = $c;
        // dd($this->cartlist);
        return view('livewire.front.cart.headercart');
    }
}
