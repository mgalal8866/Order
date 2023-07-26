<?php

namespace App\Http\Livewire\Front\Cart;

use App\Models\Cart;
use Livewire\Component;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\Auth;

class Headercart extends Component
{
    public  $cartlist = [],$count;
    protected $listeners = [ 'count' =>  '$refresh'];
    public function render()
    {
        if(!empty(Auth::guard('client')->user()->id)){
            $this->count =Cart::where('user_id',Auth::guard('client')->user()->id)->count();
        
        }

        return view('livewire.front.cart.headercart');
    }
}
