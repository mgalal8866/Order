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
     public $data =[] ,$idcategory ,$search ,$count = 30;


    public function loadmore()  {
        $this->count +=30;
    }
    public function selectid($id)  {
        $this->idcategory=$id;
    }
    public function render()
    {
        // $categorys = Category::Active(1)->parentonly()->get();
        $offers  = ProductDetails::online()->Getoffers()->with('productheader')->with('unit')->with('cart')->paginate(20);
        $products  = ProductDetails::online()->Getcategory($this->idcategory)->with('productheader')->with('unit')->with('cart'
        ,function($q){
            if(!empty(Auth::guard('client')->user()->id)){
                $q->where('user_id',Auth::guard('client')->user()->id);
            }
        })->paginate($this->count);
        $this->data =[ 'products'=>$products,'offers'=>$offers ];

        return view('livewire.front.product.home')->layout('layouts.front-end.layout');
    }
}
