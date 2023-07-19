<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\conversion;
use App\Models\Message;

class Chat extends Component
{
    public $messages=[],$conversions_id =null ;

 

    public function sentmessage(){
        dd('');
    }
    public function loadmessage($id){
        $this->conversions_id =$id;

    }
    public function render()
    {
        $cc = conversion::get();
        return view('livewire.dashboard.chat',compact(['cc']))->layout('layouts.dashboard.chatlayout');
    }
}
