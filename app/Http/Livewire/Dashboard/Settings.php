<?php

namespace App\Http\Livewire\Dashboard;

use App\Facade\Tenants;
use App\Models\setting;
use Livewire\Component;
use App\Models\ApiToken;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Settings extends Component
{
    public $setting, $apitoken,$nametoken,
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
            'fire_active'             =>$this->fire_active,
            'fire_apiKey'             =>$this->fire_apiKey,
            'fire_authDomain'         =>$this->fire_authDomain,
            'fire_project_id'         =>$this->fire_project_id,
            'fire_storageBucket'      =>$this->fire_storageBucket,
            'fire_servies'            =>$this->fire_servies,
            'fire_measurement_id'     =>$this->fire_measurement_id,
            'fire_app_id'             =>$this->fire_app_id,
            'fire_messagingSender_id' =>$this->fire_messagingSender_id,
        ]);
        setsetting();
        $this->dispatchBrowserEvent('swal',['ev'=>'success','message'=>'تم التعديل بنجاح' ]);
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
        $this->dispatchBrowserEvent('swal',['ev'=>'success','message'=>'تم التعديل بنجاح' ]);
    }
    public function siteconfig()
    {
        $this->setting->update([
            'site_color_primary'=>$this->site_color_primary,
            'site_color_second'=>$this->site_color_second,
        ]);
        setsetting();
        $this->dispatchBrowserEvent('swal',['ev'=>'success','message'=>'تم الاضافة بنجاح' ]);
    }

    public function apicreate()
    {
        ApiToken::create([
            'name'=>Str::upper($this->nametoken),
            'token'=>Str::random(25),
        ]);
        $this->reset('nametoken');
        $this->dispatchBrowserEvent('swal',['ev'=>'success','message'=>'تم الاضافة بنجاح' ]);
    }
    public function apidelete()
    {
        $apitokn = ApiToken::find();
        $apitokn->delete();
        $this->reset('nametoken');
    }

    public function render()
    {
        $this->apitoken = ApiToken::get();
        $this->setting = setting::find(1);

        $this->smsactive   = $this->setting->sms_active ;
        $this->smsusername = $this->setting->sms_username;
        $this->smspassword = $this->setting->sms_password;
        $this->smssenderid = $this->setting->sms_senderid;

        $this->site_color_primary = $this->setting->site_color_primary;
        $this->site_color_second  = $this->setting->site_color_second;

        $this->fire_active         = $this->setting->fire_active;
        $this->fire_apiKey         = $this->setting->fire_apiKey;
        $this->fire_authDomain     = $this->setting->fire_authDomain;
        $this->fire_project_id     = $this->setting->fire_project_id;
        $this->fire_storageBucket  = $this->setting->fire_storageBucket;
        $this->fire_servies        = $this->setting->fire_servies;
        $this->fire_measurement_id = $this->setting->fire_measurement_id;
        $this->fire_app_id         = $this->setting->fire_app_id;
        $this->fire_messagingSender_id = $this->setting->fire_messagingSender_id;



        return view('livewire.dashboard.settings');
    }
}
