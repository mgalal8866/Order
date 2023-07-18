<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Testchat extends Component
{

    public $e;
    // Special Syntax: ['echo:{channel},{event}' => '{method}']
    protected $listeners = ['echo:chat,.message' => 'appendContent'];
    public function appendContent($event)
    {
        $this->e = $event;
        dd($event);  //Shows the Post ID

    }

    public function render()
    {
        return view('livewire.testchat');
    }
}
