<?php

namespace App\Http\Livewire\System;

use App\Models\Tenant;
use Livewire\Component;

class Dashboard extends Component
{
    // public $tenant;
    public function render()
    {
        // $this->tenant = Tenant::get();
        return view('livewire.system.dashboard')->layout('layouts.System.layout');
    }
}
