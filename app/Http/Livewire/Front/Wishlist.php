<?php

namespace App\Http\Livewire\Front;

use App\Models\Cart;
use Livewire\Component;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist as ModelsWishlist;

class Wishlist extends Component
{
    public $qty ;
    public function removewishlist($id)
    {
        ModelsWishlist::where('product_id',$id)->delete();
    }
    public function qtyincrement(ProductDetails  $product)
    {
        if ($product->maxqty == ($product->cart->qty ?? '')) {
            return  $this->dispatchBrowserEvent('notifi', ['message' => 'هذة اقصي حد للكمية المتاحة ', 'type' => 'danger']);
        }
        Cart::getroductid($product->id)->increment('qty', $this->qty);
    }
    public function qtydecrement($product_id)
    {
        $data =  Cart::getroductid($product_id)->first();
        if ($data->qty != 1) {
            $data->decrement('qty', $this->qty);
            // $this->qty -=  $this->qty;
        } else {
            $data->delete();
            $this->emit('count');
        }
    }
    public function addtocart(ProductDetails $product)
    {
        $product->productheader->product_isscale == 1 ? $this->qty = 0.125 : $this->qty = 1;
        if ($product->maxqty == ($product->cart->qty ?? '')) {
            return  $this->dispatchBrowserEvent('notifi', ['message' => 'هذة اقصي حد للكمية المتاحة ', 'type' => 'danger']);
        }
        if ($product->Qtystockapi($product->productheader->stock->sum('quantity')) === 'غير متوفر') {
            return  $this->dispatchBrowserEvent('notifi', ['message' => 'منتج غير متوفر', 'type' => 'danger']);
        }

        Cart::updateOrCreate(['product_id' => $product->id, 'user_id' => Auth::guard('client')->user()->id], ['user_id' => Auth::guard('client')->user()->id, 'product_id' => $product->id, 'qty' =>   $this->qty]);
        $this->emit('count');
        return  $this->dispatchBrowserEvent('notifi', ['message' => 'تم الاضافة للعربة', 'type' => 'success']);
    }
    public function render()
    {
        $wish = ProductDetails::whereHas('wishlist',function ($q) {
            return  $q->where('user_id',Auth::guard('client')->user()->id);
        })->with('unit')->with('productheader')->get();
        return view('livewire.front.wishlist',['wish'=>$wish])->layout('layouts.front-end.layout');

    }
}
