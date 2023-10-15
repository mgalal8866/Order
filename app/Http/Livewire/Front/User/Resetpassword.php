<?php

namespace App\Http\Livewire\Front\User;

use Livewire\Component;
use App\Models\question;
use App\Models\CateoryApp;
use App\Models\User;

class Resetpassword extends Component
{
    public $nashat, $answer1, $answer2, $question1, $question2,  $client_fhonewhats;
    public function mount()
    {
        $this->nashat = CateoryApp::get();

    }
    public function checkphone()
    {
        $user = User::where('client_fhonewhats', $this->client_fhonewhats)->with(['question1','question2'])->first();
        if ($user != null) {
            $this->question1 = $user->question1->question;
            $this->question2 = $user->question2->question;
        }
    }
    public function render()
    {
        return view('livewire.front.user.resetpassword')->layout('layouts.front-end.layout');
    }
}
