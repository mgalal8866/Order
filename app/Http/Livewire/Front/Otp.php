<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class Otp extends Component
{
    public function render()
    {
        return view('livewire.front.otp')->layout('layouts.front-end.layout');
    }
}
