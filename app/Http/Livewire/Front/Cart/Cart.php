<?php

namespace App\Http\Livewire\Front\Cart;

use App\Models\Coupon;
use Livewire\Component;
use App\Models\deferred;
use App\Models\Wishlist;
use App\Models\SalesHeader;
use App\Models\DeliveryHeader;
use App\Models\ProductDetails;
use App\Models\Cart as ModelsCart;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $totaloffer = 0, $culc = 0, $selectdeferreds = 0, $deferreds = 0, $cartlist = [], $subtotal = 0.00, $coupondisc = 0.00, $totalfinal, $coupon, $currency = ' ج.م';
    public function mount()
    {
        $deferreds = deferred::where('user_id', Auth::guard('client')->user()->id)->select('statu')->first();
        if ($deferreds) {
            $this->deferreds = $deferreds->statu;
        }
    }
    public function culc()
    {
        $this->subtotal = 0;
        $this->totaloffer = 0;
        foreach ($this->cartlist as $i) {

            if ($i['isoffer'] == 1) {
                $this->subtotal   +=   $i['cart'][0]['qty'] * $i['productd_Sele2'];
                $this->totaloffer +=    ($i['cart'][0]['qty'] * $i['productd_Sele1']) - ($i['cart'][0]['qty'] * $i['productd_Sele2']);
            } else {
                $this->subtotal   +=   $i['cart'][0]['qty'] * $i['productd_Sele1'];
            }
        }
    }
    public function usecoupon()
    {
        $coupon = Coupon::where('code', $this->coupon)->DateValid()->first();
        if ($coupon != null)
            if ($coupon->used > 0) {
                $deliveryheader = DeliveryHeader::select('client_id', 'coupon_id')->where('client_id', Auth::user('api')->id)->where('coupon_id', $coupon->id)->count();
                $saleheader = SalesHeader::select('client_id', 'coupon_id')->where('client_id', Auth::user('api')->id)->where('coupon_id', $coupon->id)->count();
                $coupon->where('code', $this->coupon)->DateValid()->Where('used', '>', ($saleheader + $deliveryheader))->first();
                $this->coupondisc = $coupon->value;
                return $this->dispatchBrowserEvent('notifi', ['message' => 'تم اضافه الكوبون ', 'type' => 'success']);
            } else {
              return  $this->dispatchBrowserEvent('notifi', ['message' => 'تم اضافه الكوبون ', 'type' => 'success']);
            }
            return$this->dispatchBrowserEvent('notifi', ['message' => 'كوبون غير صالح', 'type' => 'danger']);

        // $coupon = Coupon::where('code', $this->coupon)->first();
        // if ($coupon) {
        //     $this->coupondisc = $coupon->value;
        //     $this->dispatchBrowserEvent('notifi', ['message' => 'تم اضافه الكوبون ', 'type' => 'success']);
        // } else {
        //     $this->dispatchBrowserEvent('notifi', ['message' => 'كوبون غير صالح', 'type' => 'danger']);
        // }
    }
    public function pluse($index)
    {

        if ($this->cartlist[$index]['cart'][0]['qty'] >= 1) {
            $this->cartlist[$index]['cart'][0]['qty'] = $this->cartlist[$index]['cart'][0]['qty'] + 1;
            $this->culc();
            ModelsCart::where('product_id', $this->cartlist[$index]['id'])->select('qty')->update(['qty' => $this->cartlist[$index]['cart'][0]['qty']]);
        }
    }
    public function saveforlater($idproduct)
    {
        Wishlist::firstOrCreate(['user_id' => Auth::guard('client')->user()->id, 'product_id' => $idproduct]);
    }
    public function minus($index)
    {
        if ($this->cartlist[$index]['cart'][0]['qty'] >= 2) {
            $this->cartlist[$index]['cart'][0]['qty'] = $this->cartlist[$index]['cart'][0]['qty'] - 1;
            $this->culc();
            ModelsCart::where('product_id', $this->cartlist[$index]['id'])->select('qty')->update(['qty' => $this->cartlist[$index]['cart'][0]['qty']]);
        }
    }
    public function removefromcart($index)
    {
        ModelsCart::where('product_id', $this->cartlist[$index]['id'])->where('user_id', Auth::guard('client')->user()->id)->delete();
    }
    public function removecoupon()
    {
        $this->coupondisc = 0;
        $this->reset('coupon');
    }
    public function render()
    {
        // with('custunit', function ($qwq) {
        //     return  $qwq->custunit();
        // })->
        $this->cartlist = ProductDetails::whereHas('cart', function ($q) {
            return  $q->where('user_id', Auth::guard('client')->user()->id);
        })->with('unit')->with('cart')->with('productheader')->get();

        $this->culc();
        return view('livewire.front.cart.cart')->layout('layouts.front-end.layout');
    }
}
