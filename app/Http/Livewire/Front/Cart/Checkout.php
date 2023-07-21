<?php

namespace App\Http\Livewire\Front\Cart;

use Livewire\Component;

class Checkout extends Component
{
    public function render()
    {
        return view('livewire.front.cart.checkout')->layout('layouts.front-end.layout');
    }
}
