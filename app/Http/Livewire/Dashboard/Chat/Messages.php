<?php

namespace App\Http\Livewire\Dashboard\Chat;

use App\Facade\Tenants;
use App\Models\Message;
use App\Models\Tenant;
use Livewire\Component;

class Messages extends Component
{

    public $messageso = [], $getid, $name,$gdomain;

    public function mount($id)
    {
        $this->gdomain = Tenants::getdomain();
        $this->getid = $id;
    }
    public function getmessagesold($id, $name)
    {
        $this->getid = $id;
        $this->name = $name;
        $this->messageso = Message::where('conversions_id', $id)->get()->toarray() ?? [];
    }

    public function getListeners()
    {

        return [
            "echo:chat.{$this->gdomain}.{$this->getid},.message" => 'appendContent',
            'getmessagesold' => 'getmessagesold'
        ];
    }
    public function appendContent($event)
    {
        $this->dispatchBrowserEvent('scroll');
        array_push($this->messageso, $event['message']);
    }

    public function render()
    {
        return view('livewire.dashboard.chat.messages');
    }
}
