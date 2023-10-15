<?php

namespace App\Http\Livewire\Front\User;

use App\Models\User;
use Livewire\Component;
use App\Models\question;
use App\Models\CateoryApp;
use Illuminate\Support\Facades\Auth;

class Resetpassword extends Component
{
    public $showqu=false, $answer1, $answer2, $question1, $question2,  $client_fhonewhats;

    public function checkphone()
    {
        $user = User::where('client_fhonewhats', $this->client_fhonewhats)->with(['question1','question2'])->first();
        if ($user != null) {
            $this->question1 = $user->question1->question;
            $this->question2 = $user->question2->question;
            $this->showqu =true;
        }

    }
    public function checkanswer()
    {
        $user = User::where([
                'client_fhonewhats'   => $this->client_fhonewhats,
                'answer1' => $this->answer1,
                'answer2' => $this->answer2])->first();
        if ($user != null) {
            auth('client')->login($user);
            if (Auth::guard('client')->check()) {
                return redirect()->intended('/');
            }else{

            }
        }
    }
    public function render()
    {
        return view('livewire.front.user.resetpassword')->layout('layouts.front-end.layout');
    }
}
