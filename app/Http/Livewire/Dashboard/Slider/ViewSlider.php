<?php

namespace App\Http\Livewire\Dashboard\Slider;

use App\Models\slider;
use Livewire\Component;

class ViewSlider extends Component
{
    public function render()
    {
        $sliders =slider::get();
        return view('livewire.dashboard.slider.view-slider',['sliders'=>$sliders]);
    }
}
