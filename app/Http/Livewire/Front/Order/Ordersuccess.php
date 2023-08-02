<?php

namespace App\Http\Livewire\Front\Order;

use App\Models\Cart;
use Livewire\Component;
use App\Models\DeliveryHeader;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Ordersuccess extends Component
{
    public $order ;
    public function mount()
    {
        $status = Session::get('status');
        if($status != true){
            redirect('/');
        }
        $id = Session::get('id');
        $this->order = DeliveryHeader::where('id',$id)->with('salesdetails')->first();
        Cart::where('user_id',Auth::guard('client')->user()->id)->delete();
    }
    public function render()
    {
        return view('livewire.front.order.ordersuccess')->layout('layouts.front-end.layout');
    }
}
