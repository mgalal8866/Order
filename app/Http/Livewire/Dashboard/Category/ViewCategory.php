<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;

class ViewCategory extends Component
{
    public $name, $parent, $image, $state, $note;
    public function mount()
    {
    }
    public function render()
    {
        $categorys = Category::get();
        return view('livewire.dashboard.category.view-category',['categorys' => $categorys]);
    }
}
