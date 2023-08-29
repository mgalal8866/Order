<?php

namespace App\Http\Livewire\Front\Order;

use App\Models\Cart;
use Livewire\Component;
use App\Models\DeliveryHeader;
use App\Models\SalesHeader;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Ordersuccess extends Component
{
    public $order ;
    public function mount()
    {
        $status = Session::get('status');
        dd($status);
        $id = Session::get('id');
        if($status == 'closeold'){
            $this->order = SalesHeader::where('id',$id)->with('salesdetails')->first();
        }
        if($status == 'old'){
            $this->order = DeliveryHeader::where('id',$id)->with('salesdetails')->first();
        }
        if($status != true){
            redirect('/');
        }
        if($status == true){
            $this->order = DeliveryHeader::where('id',$id)->with('salesdetails')->first();
            Cart::where('user_id',Auth::guard('client')->user()->id)->delete();
        }
    }
    public function render()
    {
        return view('livewire.front.order.ordersuccess')->layout('layouts.front-end.layout');
    }
}
