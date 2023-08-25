<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\gallery;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditGallery extends Component
{
    use WithFileUploads;
    public $gallery, $imagenew, $image, $name, $state;

    public function mount($id)
    {
        $gallery = gallery::find($id);
        $this->gallery = $gallery;
        $this->name   = $gallery->text;
        $this->name   = $gallery->img;

    }
    public function saveslider()
    {
        $this->gallery->update([
            'text'  => $this->text,
            'img' => $this->imagenew != null ? uploadimages('gallery', $this->imagenew) : $this->gallery->orginalimage,
            // 'active'=> $this->state,
        ]);
        $this->dispatchBrowserEvent('swal',['message'=>'تم التعديل بنجاح' ]);

    }
    public function render()
    {
        return view('livewire.dashboard.edit-gallery');
    }
}
