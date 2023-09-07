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
     public $data =['products'=>[],'offers'=>[]] ,$idcategory = null,$search ,$count = 30;

    public function mount(){
        $offers  = ProductDetails::on('tenant')->orderBy('updated_at','DESC')->online()->Getoffers()->with('productheader')->with('unit')->with('cart')->paginate($this->count);
        $this->data['offers'] = $offers ;
        $products  = ProductDetails::on('tenant')->online()->Getcategory()->with('productheader')->with('unit')->with('cart'
        ,function($q){
            if(!empty(Auth::guard('client')->user()->id)){
                $q->where('user_id',Auth::guard('client')->user()->id);
            }
        })->orderBy('updated_at','DESC')->paginate($this->count);
        $this->data['products'] = $products ;
    }
    public function loadmore()  {
        $this->count +=30;
    }
    public function selectid($idc =null)  {
        $offers  = ProductDetails::online()->Getoffers()->with('productheader')->with('unit')->with('cart')->orderBy('updated_at','DESC')->paginate(20);
        $this->data['offers'] = $offers ;

        $products  = ProductDetails::online()->Getcategory($idc)->with('productheader')->with('unit')->with('cart'
        ,function($q){
            if(!empty(Auth::guard('client')->user()->id)){
                $q->where('user_id',Auth::guard('client')->user()->id);
            }
        })->orderBy('updated_at','DESC')->paginate($this->count);
        $this->data['products'] = $products ;


    }
    public function render()
    {

        return view('livewire.front.product.home')->layout('layouts.front-end.layout');
    }
}
