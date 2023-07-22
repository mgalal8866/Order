<?php

namespace App\Http\Livewire\Front\User;

use App\Models\DeliveryHeader;
use App\Models\SalesHeader;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Userdashborad extends Component
{
    public function render()
    {
        $data =  ['user'          => User::find(Auth::guard('client')->user()->id)];
        $data += ['deliveryheader'=> DeliveryHeader::where('client_id',Auth::guard('client')->user()->id)->get()];
        $data += ['saleheader'    => SalesHeader::where('client_id',Auth::guard('client')->user()->id)->get()];
    
        return view('livewire.front.user.userdashborad',['data'=>$data])->layout('layouts.front-end.layout');
    }
}
