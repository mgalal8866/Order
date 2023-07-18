<?php

namespace App\Http\Livewire\Front\Product;

use App\Models\Category;
use App\Models\ProductDetails;
use App\Models\Wishlist;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
     public $data =[] ,$idcategory;


    public function updatedIdcategory(){
        dd($this->idcategory);
    }
    public function addtowishlist($product_id){
        Wishlist::create(['product_id'=>$product_id,'user_id'=> 1]);
    }
    public function selectid($id)  {
        $this->idcategory=$id;
    }
    public function render()
    {   $categorys = Category::Active(1)->get();
        $products  = ProductDetails::online()->Getcategory($this->idcategory)->with('productheader')->with('unit')->paginate(20);
        $this->data =['categorys'=>$categorys,'products'=>$products];
// dd($this->data[''] );
        return view('livewire.front.product.home')->layout('layouts.front-end.layout');
    }
}
