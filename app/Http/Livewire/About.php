<?php

namespace App\Http\Livewire;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.front.about')->layout('layouts.front-end.layout');
    }
}
