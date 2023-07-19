<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Testchat extends Component
{

    public $e=[];
    // Special Syntax: ['echo:{channel},{event}' => '{method}']
    protected $listeners = ['echo:messages.1,.message' => 'appendContent'];
    public function appendContent($event)
    {
        $this->e = $event;
        
    }

    public function render()
    {
        return view('livewire.testchat');
    }
}
