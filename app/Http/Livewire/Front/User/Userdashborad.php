<?php

namespace App\Http\Livewire\Front\User;

use App\Models\Cart;
use App\Models\ClientPayments;
use App\Models\DeliveryHeader;
use App\Models\notifiction;
use App\Models\SalesHeader;
use App\Models\User;
use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Userdashborad extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

        public function getopeninvo($id){
            redirect()->route('ordersuccess')->with( ['status' => 'old','id' => $id] );
        }
        public function getcloseinvo($id){
            redirect()->route('ordersuccess')->with( ['status' => 'closeold','id' => $id] );
        }

    public function render()
    {

        $data =  ['user'          => User::find(Auth::guard('client')->user()->id)];
        $data += ['deliveryheader'=> DeliveryHeader::where('client_id',Auth::guard('client')->user()->id)->get()];
        $data += ['cart'          => Cart::where('user_id',Auth::guard('client')->user()->id)->get()];
        $data += ['wishlist'      => Wishlist::where('user_id',Auth::guard('client')->user()->id)->get()];
        $data += ['saleheader'    => SalesHeader::where('client_id',Auth::guard('client')->user()->id)->get()];
        $data += ['clientpayment'    => ClientPayments::where('clientpay_id',Auth::guard('client')->user()->id)->latest()->get()];
        $data += ['notfiction'    =>  notifiction::where('user_id', Auth::guard('client')->user()->id)->orwhere('user_id', null)->latest()->paginate(20)];
        return view('livewire.front.user.userdashborad', [ 'data'=>$data ])->layout('layouts.front-end.layout');
    }
}
