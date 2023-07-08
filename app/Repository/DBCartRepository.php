<?php

namespace App\Repository;

use App\Models\Cart;
use App\Models\deferred;
use Illuminate\Support\Facades\Auth;
use App\Repositoryinterface\CartRepositoryinterface;
use Carbon\Carbon;

class DBCartRepository implements CartRepositoryinterface
{
    public function getcart()
    {
        return  Cart::where('user_id', Auth::user('api')->id)->with('productdetails')->get();
    }
    public function addtocart($product_id, $qty)
    {
        $w =   Cart::updateOrCreate(['product_id' => $product_id, 'user_id' => Auth::user('api')->id], ['user_id' => Auth::user('api')->id, 'product_id' => $product_id, 'qty' => $qty]);
        if ($qty == 0) {
            $this->deletecart($w->id);
        }
        if ($w) {
            return $this->getcart();
        }
        // $c =  Cart::create(['user_id' => Auth::user('api')->id, 'product_id' => $product_id, 'qty' => $qty]);
        // if ($c)
        //     return $this->getcart();
    }
    public function deletecart($cart_id)
    {
        $w =   Cart::where('id', $cart_id)->where('user_id', Auth::user('api')->id)->first();
        if ($w->delete() != null) {
            return   $this->getcart();
        } else {
            return   $this->getcart();
        };
    }
    public function applydeferred()
    {
        $deferred = deferred::where('user_id', Auth::user('api')->id)->first();
        if ($deferred?->statu == 0 && $deferred != null) {
            return 'الطلب قيد المراجعة';
        } elseif ($deferred?->statu == 1 && $deferred != null) {
            return '1';
        }
        $deferred1 = deferred::create(['user_id' => Auth::user('api')->id]);
    }
}
