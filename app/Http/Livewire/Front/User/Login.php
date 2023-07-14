<?php

namespace App\Http\Livewire\Front\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Providers\RouteServiceProvider;

class Login extends Component
{   public $phone, $susses;
    protected $listeners = [
        'success'
   ];
   //
   public function success($value)
   {
       if(!is_null($value))
           $this->susses = $value;
   }
    public function login(){
        
        $user = User::where('client_fhonewhats',$this->phone)->first();
        $this->dispatchBrowserEvent('sendOTP', ['phone' => '+2'.$user->client_fhonewhats]);

        // Auth::guard('client')->login($user);
        //     if(Auth::guard('client')->check())
        //     {
        //         // return redirect()->intended('/');
        //     }
    }
    public function render()
    {

        return view('livewire.front.user.login')->layout('layouts.front-end.layout');
    }
}
