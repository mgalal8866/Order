<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class Contactus extends Component
{
    public function render()
    {
        return view('livewire.front.contactus')->layout('layouts.front-end.layout');
    }
}
