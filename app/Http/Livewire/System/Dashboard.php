<?php

namespace App\Http\Livewire\System;

use App\Models\Tenant;
use Livewire\Component;
use App\Models\ApiToken;
use Illuminate\Support\Str;

class Dashboard extends Component
{
    public $tenant ,$setting, $apitoken =[], $nametoken,
        $smsactive,
        $smssenderid,
        $smsusername,
        $smspassword,

        $site_color_primary,
        $site_color_second,

        $fire_active,
        $fire_apiKey,
        $fire_authDomain,
        $fire_project_id,
        $fire_storageBucket,
        $fire_servies,
        $fire_measurement_id,
        $fire_app_id,
        $fire_messagingSender_id;


    public function fireconfig()
    {
        $this->setting->update([
            'fire_active'             => $this->fire_active,
            'fire_apiKey'             => $this->fire_apiKey,
            'fire_authDomain'         => $this->fire_authDomain,
            'fire_project_id'         => $this->fire_project_id,
            'fire_storageBucket'      => $this->fire_storageBucket,
            'fire_servies'            => $this->fire_servies,
            'fire_measurement_id'     => $this->fire_measurement_id,
            'fire_app_id'             => $this->fire_app_id,
            'fire_messagingSender_id' => $this->fire_messagingSender_id,
        ]);
        setsetting();
        $this->dispatchBrowserEvent('swal', ['ev' => 'success', 'message' => 'تم التعديل بنجاح']);
    }
    public function smsconfig()
    {
        $this->setting->update([
            'sms_active'   => $this->smsactive,
            'sms_username' => $this->smsusername,
            'sms_password' => $this->smspassword,
            'sms_senderid' => $this->smssenderid,
        ]);
        setsetting();
        $this->dispatchBrowserEvent('swal', ['ev' => 'success', 'message' => 'تم التعديل بنجاح']);
    }
    public function siteconfig()
    {
        $this->setting->update([
            'site_color_primary' => $this->site_color_primary,
            'site_color_second' => $this->site_color_second,
        ]);
        setsetting();
        $this->dispatchBrowserEvent('swal', ['ev' => 'success', 'message' => 'تم الاضافة بنجاح']);
    }

    public function apicreate()
    {
        ApiToken::create([
            'name' => Str::upper($this->nametoken),
            'token' => Str::random(25),
        ]);
        $this->reset('nametoken');
        $this->dispatchBrowserEvent('swal', ['ev' => 'success', 'message' => 'تم الاضافة بنجاح']);
    }
    public function apidelete()
    {
        $apitokn = ApiToken::find();
        $apitokn->delete();
        $this->reset('nametoken');
    }
    public function render()
    {
        $this->tenant = Tenant::get();
        return view('livewire.system.dashboard')->layout('layouts.System.layout');
    }
}
