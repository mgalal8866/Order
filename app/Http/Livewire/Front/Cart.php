<?php

namespace App\Http\Livewire\Front;

use App\Models\Cart as ModelsCart;
use App\Models\Coupon;
use App\Models\ProductDetails;
use Livewire\Component;

class Cart extends Component
{
    public $cartlist=[],$subtotal,$coupondisc = 0.00,$totalfinal,$coupon;

    public function mount(){

        $this->cartlist = ProductDetails::whereHas('cart',function ($q) {
            // return   $q->where('user_id',1);
        })->with('unit')->with('cart')->with('unit')->with('productheader')->get()->toarray();
        // dd($this->cartlist);
    }
    public function usecoupon(){
        $coupon = Coupon::where('code',$this->coupon)->first();
        if($coupon){
            $this->coupondisc = $coupon->value;
        }
    }
    public function pluse($index){
        $this->dispatchBrowserEvent('notifi',['message'=> __('tran.sucesscustomrt') ]);

        if($this->cartlist[$index]['cart'][0]['qty'] >= 1){
            $this->cartlist[$index]['cart'][0]['qty'] = $this->cartlist[$index]['cart'][0]['qty']+1;
            ModelsCart::where('product_id',$this->cartlist[$index]['id'])->select('qty')->update(['qty'=> $this->cartlist[$index]['cart'][0]['qty']]);
        }
    }
    public function minus($index){
        if($this->cartlist[$index]['cart'][0]['qty'] >= 2){
            $this->cartlist[$index]['cart'][0]['qty'] = $this->cartlist[$index]['cart'][0]['qty']-1;
            ModelsCart::where('product_id',$this->cartlist[$index]['id'])->select('qty')->update(['qty'=> $this->cartlist[$index]['cart'][0]['qty']]);
        }
    }
    public function removefromcart($index){
        unset($this->cartlist[$index] );
    }
    public function removecoupon(){
        $this->coupondisc =0;
        $this->reset('coupon');
    }
    public function render()
    {
        return view('livewire.front.cart')->layout('layouts.front-end.layout');
    }
}
