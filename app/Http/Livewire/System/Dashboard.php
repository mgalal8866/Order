<?php

namespace App\Http\Livewire\System;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.system.dashboard')->layout('layouts.System.layout');
    }
}
