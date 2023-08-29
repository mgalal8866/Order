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
        $data = ['seenmsg' =>  0, 'conversions_id' =>  $this->conversions_id, 'message' => $this->text, 'admin_id' => Auth::guard('admin')->user()->id];

        $messages = message::create($data);;
        $msg = new ChatResource($messages);
        event(new MessageSent($msg));


        $con = conversion::find($this->conversions_id);
        notificationFCM('رسالة جديده', $this->text,[$con->user->fsm]);
         $this->text ='';
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
