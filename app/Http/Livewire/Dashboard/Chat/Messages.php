<?php

namespace App\Http\Livewire\Dashboard\Chat;

use App\Models\Message;
use Livewire\Component;

class Messages extends Component
{

    public $messageso=[],$getid,$name ;

    public function mount($id)
    {
        $this->getid = $id;
    }
    public function getmessagesold($id,$name)
    {
        $this->getid = $id;
        $this->name = $name;
        
        $this->messageso = Message::where('conversions_id',$id)->get()->toarray()??[];
    }

    public function getListeners()
    {

        return [
            "echo:chat.{$this->getid},.message" => 'appendContent',
            'getmessagesold' => 'getmessagesold'

        ];
    }
    public function appendContent($event){
    // dd($event['message']['message']);
    array_push($this->messageso, $event['message']);

}

public function render()
{
   return view('livewire.dashboard.chat.messages');
}
}
