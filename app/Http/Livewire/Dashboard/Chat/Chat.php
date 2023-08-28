<?php

namespace App\Http\Livewire\Dashboard\Chat;

use App\Models\Message;
use Livewire\Component;
use App\Models\conversion;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\chat\ChatResource;
use App\Models\setting;

class Chat extends Component
{
    public $messagesold=[], $messages=[],$conversions_id =null,$text ,$nameuser,$cc ;
    // protected $listeners = ['echo:chat.1,.message' => 'appendContent'];
    public function sentmessage(){
        $messages = message::create(['seenmsg' =>  0, 'conversions_id' =>  $this->conversions_id, 'message' => $this->text, 'admin_id' => Auth::guard('admin')->user()->id]);;

        $msg = new ChatResource($messages);
         event(new MessageSent($msg));
         $this->text ='';
         $con = conversion::find($this->conversions_id);
         $sett = setting::find(1);
         notificationFCM('رسالة جديده', $this->text,[$con->user->fsm]);
    }
    public function loadmessage($id,$name){
        $this->conversions_id = $id;
         $this->nameuser = $name;
         $this->emit('getmessagesold', $id,$name);
         $this->dispatchBrowserEvent('scroll');
    }
    public function render()
    {
        $this->cc = conversion::get();
        return view('livewire.dashboard.chat.chat')->layout('layouts.dashboard.chatlayout');
    }
}
