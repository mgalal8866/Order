<?php

namespace App\Http\Livewire\Front;

use App\Models\gallery as ModelsGallery;
use Livewire\Component;
class Gallery extends Component
{
    public function render()
    {
        $gallery = ModelsGallery::get();

 
        return view('livewire.front.gallery',['gallery'=>  $gallery])->layout('layouts.front-end.layout');
    }
}
