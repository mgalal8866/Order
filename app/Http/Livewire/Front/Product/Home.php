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

    public function mount(){
        $offers  = ProductDetails::online()->Getoffers()->with('productheader')->with('unit')->with('cart')->orderBy('updated_at','DESC')->paginate(20);
        $this->data =[ 'offers'=>$offers ];
    }
    public function loadmore()  {
        $this->count +=30;
    }
    public function selectid($id)  {
        $this->idcategory = $id;

    }
    public function render()
    {
        // $categorys = Category::Active(1)->parentonly()->get();
        $products  = ProductDetails::online()->Getcategory($this->idcategory)->with('productheader')->with('unit')->with('cart'
        ,function($q){
            if(!empty(Auth::guard('client')->user()->id)){
                $q->where('user_id',Auth::guard('client')->user()->id);
            }
        })->orderBy('updated_at','DESC')->paginate($this->count);
        $this->data +=[ 'products'=>$products ];


        return view('livewire.front.product.home')->layout('layouts.front-end.layout');
    }
}
