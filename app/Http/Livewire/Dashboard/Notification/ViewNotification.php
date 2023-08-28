<?php

namespace App\Http\Livewire\Dashboard\Notification;

use App\Models\User;
use App\Models\setting;
use Livewire\Component;
use App\Models\notifiction;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ViewNotification extends Component
{
    use WithFileUploads;
    public $setting, $selectactive = 1, $body, $title, $image, $users, $selectusers = [],
        $notif_sent_cart,
        $notif_change_statu,
        $notif_neworder,
        $notif_newoffer,
        $notif_welcome,
        $notif_chat,
        $notif_cart_text,
        $notif_change_text,
        $notif_neworder_text,
        $notif_newoffer_text,
        $notif_welcome_text,
        $notif_newchat_text;

    public function mount()
    {

        $this->setting = setting::find(1);

        $this->notif_sent_cart       = $this->setting->notif_sent_cart == 1 ? true : false;
        $this->notif_change_statu    = $this->setting->notif_change_statu == 1 ? true : false;
        $this->notif_neworder        = $this->setting->notif_neworder == 1 ? true : false;
        $this->notif_newoffer        = $this->setting->notif_newoffer == 1 ? true : false;
        $this->notif_welcome         = $this->setting->notif_welcome == 1 ? true : false;
        $this->notif_chat            = $this->setting->notif_chat == 1 ? true : false;

        $this->notif_cart_text       = $this->setting->notif_cart_text;
        $this->notif_change_text     = $this->setting->notif_change_text;
        $this->notif_neworder_text   = $this->setting->notif_neworder_text;
        $this->notif_newoffer_text   = $this->setting->notif_newoffer_text;
        $this->notif_welcome_text    = $this->setting->notif_welcome_text;
        $this->notif_newchat_text    = $this->setting->notif_newchat_text;

        $this->users = user::where('fsm', '!=', null)->get();
    }

    public function setconfig()
    {

        $this->setting->update([
            'notif_sent_cart' => $this->notif_sent_cart == true ? 1 : 0,
            'notif_change_statu' => $this->notif_change_statu == true ? 1 : 0,
            'notif_neworder' => $this->notif_neworder == true ? 1 : 0,
            'notif_newoffer' => $this->notif_newoffer == true ? 1 : 0,
            'notif_welcome' => $this->notif_welcome == true ? 1 : 0,
            'notif_chat' => $this->notif_chat == true ? 1 : 0,
            'notif_cart_text' => $this->notif_cart_text,
            'notif_change_text' => $this->notif_change_text,
            'notif_neworder_text' => $this->notif_neworder_text,
            'notif_newoffer_text' => $this->notif_newoffer_text,
            'notif_welcome_text' => $this->notif_welcome_text,
            'notif_newchat_text' => $this->notif_newchat_text,
        ]);
        setsetting();
    }

    public function sendnotifiction()
    {

        $this->users = DB::table('users')->pluck('fsm')->toArray();
        Log::error($this->users);
        $results =  notificationFCM($this->title, $this->body,$this->users);
        // notifiction::create(['titel' => $this->title, 'body' => $this->body, 'user' => $this->users, 'image' => $this->image, 'results' => $results]);
    }
    public function render()
    {
        return view('livewire.dashboard.notification.view-notification');
    }
}
