<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class Slider extends Component
{
    public $search;

    public function gotosearch(){
        dd( $this->search);

    }
    public function render()
    {
        return view('livewire.front.slider')->layout('layouts.front-end.layout');
    }
}
