<?php

namespace App\Http\Livewire\Dashboard\Chat;

use App\Models\Message;
use Livewire\Component;

class Messages extends Component
{
    public $messageso=[],$getid ;

    // protected $listeners = ['echo:chat.1,.message' => 'appendContent'];
    public function mount($id)
    {

        $this->getid = $id;
        $this->messageso = Message::where('conversions_id',$id)->get();
    }

    public function getListeners()
    {

        return [
            "echo:chat.{$this->getid},.message" => 'appendContent'

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
