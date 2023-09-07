<?php

namespace App\Http\Livewire\System;

use Livewire\Component;
use Illuminate\Support\Facades\Config;

class SwitchDatabase extends Component
{
    public $selectedConnection = 'tenant'; // The selected database connection

    public function switchConnection()
    {
        Config::set('database.default', $this->selectedConnection);
        return redirect()->to('/system/dashboard'); // Redirect to a relevant page
    }


    public function render()
    {
        return view('livewire.system.switch-database');
    }
}
