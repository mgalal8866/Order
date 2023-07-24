<?php

namespace App\Http\Livewire\Front;

use App\Models\slider;
use Livewire\Component;

class Sliderbar extends Component
{
    public $sliders;
    public function mount(){

        $this->sliders = slider::get();
    }
    public function render()
    {
        return view('livewire.front.sliderbar');
    }
}
