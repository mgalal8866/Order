<?php

namespace App\Http\Livewire\Front\Compon;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Product extends Component
{
    public $product, $count, $qty, $instock, $maxqty,$wish =false;
    public function mount($product,$wish =false)
    {
        $this->wish = $wish;
        $this->product = $product;
        $this->product->productheader->product_isscale == 1 ? $this->qty = 0.125 : $this->qty = 1;
    }

    public function qtyincrement($product_id)
    {
        if ($this->product->productheader->stockmany->sum('quantity') <= $this->product->cart->qty) {
            return  $this->dispatchBrowserEvent('notifi', ['message' => 'لايمكن طلب كمية اكبر من المخزون', 'type' => 'danger']);
        }
        if ($this->product->maxqty == ($this->product->cart->qty ?? '')) {
            return  $this->dispatchBrowserEvent('notifi', ['message' => 'هذة اقصي حد للكمية المتاحة ', 'type' => 'danger']);
        }
        Cart::getroductid($product_id)->increment('qty', $this->qty);
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
    public function addtocart($product_id)
    {

        if ($this->product->Qtystockapi($this->product->productheader->stockmany->sum('quantity')) === 'غير متوفر') {
            return  $this->dispatchBrowserEvent('notifi', ['message' => 'منتج غير متوفر', 'type' => 'danger']);
        }
        if ($this->product->maxqty == ($this->product->cart->qty ?? '')) {
            return  $this->dispatchBrowserEvent('notifi', ['message' => 'هذة اقصي حد للكمية المتاحة ', 'type' => 'danger']);
        }

        Cart::updateOrCreate(['product_id' => $this->product->id, 'user_id' => Auth::guard('client')->user()->id], ['user_id' => Auth::guard('client')->user()->id, 'product_id' => $product_id, 'qty' =>   $this->qty]);
        $this->emit('count');
        return  $this->dispatchBrowserEvent('notifi', ['message' => 'تم الاضافة للعربة', 'type' => 'success']);
    }
    public function addtowishlist($product_id)
    {
        $wishlist = Wishlist::where(['product_id' => $this->product->id, 'user_id' => Auth::guard('client')->user()->id])->first();
        if ($wishlist) {
            $wishlist->delete();
        } else {
            Wishlist::create(['product_id' => $this->product->id, 'user_id' => Auth::guard('client')->user()->id]);
        }
    }
    // public function removewishlist($id)
    // {
    //     Wishlist::where('product_id',$id)->delete();
    // }

    public function render()
    {
        $this->product = ProductDetails::where('id', $this->product->id)
        ->online()
        ->with('productheader')
        ->with('unit')
        ->with('cart',
            function ($q) {
                if (!empty(Auth::guard('client')->user()->id)) {
                    $q->where('user_id', Auth::guard('client')->user()->id);
                }
            }
        )->first();
        return view('livewire.front.compon.product');
    }
}
