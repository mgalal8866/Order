<?php

namespace App\Repository;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\deferred;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Repositoryinterface\CartRepositoryinterface;

class DBCartRepository implements CartRepositoryinterface
{
    public function getcart()
    {
        $c =  Cart::where('user_id', Auth::guard('api')->user()->id)->with('productdetails')->get();
        foreach ($c as $item) {
            $pro = ProductDetails::find($item->product_id);
            if ($pro->Qtystockapi($item->qty ?? 0) != 'متوفر') {
                Cart::where(['user_id' => Auth::guard('api')->user()->id, 'product_id' => $item->product_id])->delete();
            }
        }
        return  Cart::where('user_id', Auth::guard('api')->user()->id)->with('productdetails')->get();
    }
    public function addtocart($product_id, $qty)
    {
        $w =   Cart::updateOrCreate(['product_id' => $product_id, 'user_id' => Auth::guard('api')->user()->id], ['user_id' => Auth::guard('api')->user()->id, 'product_id' => $product_id, 'qty' => $qty]);
        if ($qty == 0) {
            $this->deletecart($w->id);
        }
        if ($w) {
            return $this->getcart();
        }
        // $c =  Cart::create(['user_id' => Auth::guard('api')->user()->id, 'product_id' => $product_id, 'qty' => $qty]);
        // if ($c)
        //     return $this->getcart();
    }
    public function deletecart($cart_id)
    {

        $w =   Cart::where('id', $cart_id)->where('user_id', Auth::guard('api')->user()->id)->first();
        if ($w->delete() != null) {
            return   $this->getcart();
        } else {
            return   $this->getcart();
        };
    }
    public function applydeferred()
    {
        $deferred = deferred::where('user_id', Auth::guard('api')->user()->id)->first();
        if ($deferred?->statu == 0 && $deferred != null) {
            return 'الطلب قيد المراجعة';
        } elseif ($deferred?->statu == 1 && $deferred != null) {
            return '1';
        }
        $deferred1 = deferred::create(['user_id' => Auth::guard('api')->user()->id]);
    }
}
