<?php

namespace App\Http\Livewire\Dashboard\Notification;

use App\Models\notifiction;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ViewNotification extends Component
{   use WithFileUploads;
    public $selectactive =1,$body,$title,$image,$users,$selectusers=[];

    public function mount(){
        $this->users = user::where('fsm','!=',null)->get();
    }
    public function sendnotifiction(){
      $results =  notificationFCM($this->title,$this->body,[]);
        notifiction::create(['titel'=>$this->title, 'body'=>$this->body ,'user'=>$this->users,'image'=>$this->image,'results'=>$results]);
    }
    public function render()
    {
        return view('livewire.dashboard.notification.view-notification');
    }
}
