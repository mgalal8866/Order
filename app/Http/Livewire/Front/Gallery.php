<?php

namespace App\Http\Livewire\Front;
use Livewire\Component;
class Gallery extends Component
{
    public function render()
    {
        return view('livewire.front.gallery')->layout('layouts.front-end.layout');
    }
}
