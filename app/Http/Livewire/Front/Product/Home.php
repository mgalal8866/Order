<?php

namespace App\Http\Livewire\Front\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Category;
use App\Models\Wishlist;
use Livewire\WithPagination;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    use WithPagination;
     public $data =[] ,$idcategory;


     public function qtyincrement($product_id){
         Cart::where(['product_id' => $product_id, 'user_id' => Auth::guard('client')->user()->id])->first()->increment('qty');
     }
     public function qtydecrement($product_id){
       $data =  Cart::where(['product_id' => $product_id, 'user_id' => Auth::guard('client')->user()->id])->first();
       if($data->qty != 1){
           $data->decrement('qty');
        }
     }
    public function addtocart($product_id){


    //   $ss =  Cart::updateOrCreate(['product_id' => $product_id, 'user_id' => Auth::guard('client')->user()->id], ['user_id' => Auth::guard('client')->user()->id, 'product_id' => $product_id, 'qty' => DB::raw('qty + ' . 1)]);
      $ss =  Cart::updateOrCreate(['product_id' => $product_id, 'user_id' => Auth::guard('client')->user()->id], ['user_id' => Auth::guard('client')->user()->id, 'product_id' => $product_id, 'qty' =>  1]);

    }
    public function addtowishlist($product_id){
        Wishlist::create(['product_id'=>$product_id,'user_id'=> Auth::guard('client')->user()->id]);
    }
    public function selectid($id)  {
        $this->idcategory=$id;
    }
    public function render()
    {
        // $categorys = Category::Active(1)->parentonly()->get();
        $offers  = ProductDetails::online()->Getoffers()->with('productheader')->with('unit')->with('cart')->paginate(20);
        $products  = ProductDetails::online()->Getcategory($this->idcategory)->with('productheader')->with('unit')->with('cart')->paginate(20);
        $this->data =[ 'products'=>$products,'offers'=>$offers ];

        return view('livewire.front.product.home')->layout('layouts.front-end.layout');
    }
}
