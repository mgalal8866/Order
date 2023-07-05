<?php

namespace App\Http\Livewire\Dashboard\Units;

use App\Models\unit;
use Livewire\Component;

class Units extends Component
{
    public $units;

    public function mount()
    {
        $this->units = unit::get();
    }
    public function render()
    {
        return view('livewire.dashboard.units.units');
    }
}
