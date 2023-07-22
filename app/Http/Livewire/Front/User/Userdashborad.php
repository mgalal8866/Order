<?php

namespace App\Http\Livewire\Front\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Userdashborad extends Component
{
    public function render()
    {
        $user = User::find(Auth::guard('client')->user()->id);
        return view('livewire.front.user.userdashborad',['user'=>$user])->layout('layouts.front-end.layout');
    }
}
