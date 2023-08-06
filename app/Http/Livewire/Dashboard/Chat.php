<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Message;
use Livewire\Component;
use App\Models\conversion;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\chat\ChatResource;

class Chat extends Component
{
    public $messages=[],$conversions_id =null,$text ;



    public function sentmessage(){

        $messages = message::create(['conversions_id' =>  $this->conversions_id, 'message' => $this->text, 'admin_id' => Auth::guard('admin')->user()->id]);;
         $msg = new ChatResource($messages);
         $this->text ='';
         event(new MessageSent($msg));

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
