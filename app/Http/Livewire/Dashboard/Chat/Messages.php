<?php

namespace App\Http\Livewire\Dashboard\Chat;

use App\Models\Message;
use Livewire\Component;

class Messages extends Component
{
    public $messages=[],$conversions_id ;
    public function mount($id)
    {
        $this->conversions_id = $id;

        // $this->messages =
        $this->messages = Message::where('conversions_id',$id)->get()->toarray()??[];
    }
     public function getListeners()
    {
        return [
            "echo:messages.{$this->conversions_id},.message" => 'appendContent'
        ];
    }
    public function appendContent($event){
        dd($event);
        array_push($this->messages, $event->message);

    }
    public function render()
    {
        return view('livewire.dashboard.chat.messages');
    }
}
