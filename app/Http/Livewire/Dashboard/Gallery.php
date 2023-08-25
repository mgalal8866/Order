<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\gallery as ModelsGallery;
use Livewire\Component;

class Gallery extends Component
{
    public function render()
    {
        $gallery = ModelsGallery::get();
        return view('livewire.dashboard.gallery', ['gallery' => $gallery]);
    }
}
