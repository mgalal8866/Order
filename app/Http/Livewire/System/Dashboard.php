<?php

namespace App\Http\Livewire\System;

use App\Models\Tenant;
use App\Facade\Tenants;
use App\Models\setting;
use Livewire\Component;
use App\Models\ApiToken;
use Illuminate\Support\Str;
use App\Http\Livewire\MyHook;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public   $maintenats, $domintenant, $tenant=[], $selecttenats = null, $setting, $apitoken = [], $nametoken,
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

    public function updatedSelecttenats()
    {

        Tenants::switchTanent($this->selecttenats);
        $setting = setting::on('tenant')->find(1);

        $this->smsactive   =  $setting->sms_active;
        $this->smsusername =  $setting->sms_username;
        $this->smspassword =  $setting->sms_password;
        $this->smssenderid =  $setting->sms_senderid;

        $this->site_color_primary =  $setting->site_color_primary;
        $this->site_color_second  =  $setting->site_color_second;

        $this->fire_active         =  $setting->fire_active;
        $this->fire_apiKey         =  $setting->fire_apiKey;
        $this->fire_authDomain     =  $setting->fire_authDomain;
        $this->fire_project_id     =  $setting->fire_project_id;
        $this->fire_storageBucket  =  $setting->fire_storageBucket;
        $this->fire_servies        =  $setting->fire_servies;
        $this->fire_measurement_id =  $setting->fire_measurement_id;
        $this->fire_app_id         =  $setting->fire_app_id;
        $this->fire_messagingSender_id =  $setting->fire_messagingSender_id;

    }
    public function fireconfig()
    {
        Tenants::switchTanent($this->selecttenats);
        $setting = setting::on('tenant')->find(1);
        $setting->update([
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
        setsettingwithdomain(Tenants::getdomain());
        $this->dispatchBrowserEvent('swal', ['ev' => 'success', 'message' => 'تم التعديل بنجاح']);
    }
    public function boot()
    {
        // Tenants::switchTanent($this->id);
    }
    public function smsconfig()
    {

        Tenants::switchTanent($this->selecttenats);
        $setting = setting::on('tenant')->find(1);
         $setting->update([$this->smsactive,
            'sms_username' => $this->smsusername,
            'sms_password' => $this->smspassword,
            'sms_senderid' => $this->smssenderid,
        ]);
        setsettingwithdomain(Tenants::getdomain());
        $this->dispatchBrowserEvent('swal', ['ev' => 'success', 'message' => 'تم التعديل بنجاح']);
    }
    public function siteconfig()
    {
        // dd(Tenants::getdomain());
        Tenants::switchTanent($this->selecttenats);
        $setting = setting::on('tenant')->find(1);
        $setting->update([
            'site_color_primary' => $this->site_color_primary,
            'site_color_second' => $this->site_color_second,
        ]);
        // dd(Tenants::getdomain());
        setsettingwithdomain(Tenants::getdomain());
        $this->dispatchBrowserEvent('swal', ['ev' => 'success', 'message' => 'تم الاضافة بنجاح']);
    }

    public function apicreate()
    {
        Tenants::switchTanent($this->selecttenats);
        ApiToken::on('tenant')->create([
            'name' => Str::upper($this->nametoken),
            'token' => Str::random(25),
        ]);
        $this->reset('nametoken');
        $this->dispatchBrowserEvent('swal', ['ev' => 'success', 'message' => 'تم الاضافة بنجاح']);
    }
    public function apidelete($id)
    {
        Tenants::switchTanent($this->selecttenats);
        $apitokn = ApiToken::on('tenant')->find($id);
        $apitokn->delete();
        $this->reset('nametoken');

    }
    public function render()
    {
        return view('livewire.system.dashboard')->layout('layouts.System.layout');
    }

    public function mount(){

        $this->tenant = Tenant::get();

    }
}
