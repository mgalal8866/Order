<?php

namespace App\Http\Livewire\Front\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Providers\RouteServiceProvider;

class Login extends Component
{   public $phone;
    public function mount(){

    }
    public function login(){

        $user = User::where('client_fhonewhats',$this->phone)->first();
        Auth::guard('client')->login($user);
    //    $credentials = $request->except(['_token']);
            if(Auth::guard('client')->attempt( $user))
            {
                return redirect(RouteServiceProvider::FRONT);
            }
    }
    public function render()
    {

        return view('livewire.front.user.login')->layout('layouts.front-end.layout');
    }
}
