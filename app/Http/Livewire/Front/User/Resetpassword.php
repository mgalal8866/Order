<?php

namespace App\Http\Livewire\Front\User;

use Livewire\Component;
use App\Models\question;
use App\Models\CateoryApp;

class Resetpassword extends Component
{
    public $nashat, $answer1, $answer2, $question1_id, $question2_id, $question, $client_fhonewhats;
    public function mount()
    {
        $this->nashat = CateoryApp::get();
        $this->question = question::get();
    }
    public function render()
    {
        return view('livewire.front.user.resetpassword')->layout('layouts.front-end.layout');
    }
}
