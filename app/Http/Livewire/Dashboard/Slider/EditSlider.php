<?php

namespace App\Http\Livewire\Dashboard\Slider;

use App\Models\slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSlider extends Component
{
    use WithFileUploads;
    public $slider, $imagenew, $image, $name, $state;

    public function mount($id)
    {
        $slider = slider::find($id);
        $this->slider = $slider;
        $this->name   = $slider->name;
        $this->image  = $slider->image;
        $this->state  = $slider->active==1?true:false;
    }
    public function saveslider()
    {
        $this->slider->update([
            'name'  => $this->name,
            'image' => $this->imagenew != null ? uploadimages('sliders', $this->imagenew) : $this->slider->orginalimage,
            'active'=> $this->state,
        ]);
        $this->dispatchBrowserEvent('swal',['message'=>'تم التعديل بنجاح' ]);

    }

    public function render()
    {
        return view('livewire.dashboard.slider.edit-slider');
    }
}
