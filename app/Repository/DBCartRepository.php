<?php

namespace App\Repository;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Repositoryinterface\CartRepositoryinterface;

class DBCartRepository implements CartRepositoryinterface
{
    public function getcart()
    {
        return  Cart::where('user_id', Auth::user()->id)->with('productdetails')->get();
    }
    public function addtocart($product_id, $qty)
    {
        $w =   Cart::where('product_id', $product_id)->where('user_id', Auth::user()->id)->first();
        if ($w) {
            return $this->getcart();
        }
        $c =  Cart::create(['user_id' => Auth::user()->id, 'product_id' => $product_id, 'qty' => $qty]);
        if ($c)
            return $this->getcart();
    }
    public function deletecart($cart_id)
    {

        $w =   Cart::where('id', $cart_id)->where('user_id', Auth::user()->id)->first();

        if ($w->delete()) {
            return   $this->getcart();
        }else{
            return   $this->getcart();
        };
    }
}
