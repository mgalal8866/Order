<?php

namespace App\Http\Livewire\Front\Compon;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\Auth;

class Product extends Component
{
    public $product ,$count;
    public function mount( $product){
        $this->product= $product;
    }
    public function qtyincrement($product_id){
        Cart::getroductid($product_id)->increment('qty');

    }
    public function gotosearch(){

    }

    public function qtydecrement($product_id){
      $data =  Cart::getroductid($product_id)->first();
      if($data->qty != 1){
          $data->decrement('qty');
       }else{
        $data->delete();
        $this->emit('count');
       }
    }
   public function addtocart($product_id){
        $ss =  Cart::updateOrCreate(['product_id' => $this->product->id, 'user_id' => Auth::guard('client')->user()->id], ['user_id' => Auth::guard('client')->user()->id, 'product_id' => $product_id, 'qty' =>  1]);
        $this->emit('count');
   }
   public function addtowishlist($product_id){
       Wishlist::create(['product_id'=>$this->product->id,'user_id'=> Auth::guard('client')->user()->id]);
   }
    public function render()
    {
        $this->product = ProductDetails::where('id',$this->product->id)->online()->with('productheader')->with('unit')->with('cart'
        ,function($q){
            if(!empty(Auth::guard('client')->user()->id)){
                $q->where('user_id',Auth::guard('client')->user()->id);
            }
           
        })->first();
        return view('livewire.front.compon.product');
    }
}
