<?php

namespace App\Http\Livewire\Front\User;

use App\Models\User;
use App\Models\cities;
use App\Models\region;
use Livewire\Component;
use App\Models\CateoryApp;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $client_fhonewhats, $user, $showotp = 1, $formsignup, $phone2, $namecust, $namestore, $selectcity, $selectnashat, $selectstate, $citys = [], $states = [], $nashat = [];
    public $success;
    protected $listeners = [
        'success' => 'success1'
    ];
    protected $rules = [
        'client_fhonewhats' => 'required|unique:users,client_fhonewhats',
    ];
    protected $messages = [
        'client_fhonewhats.unique' => 'رقم الهاتف مستخدم مسبقا',
        'client_fhonewhats.required' => 'رقم الهاتف مطوب',
    ];
    public function mount()
    {
        $this->citys = cities::get();
        $this->nashat = CateoryApp::get();
    }
    public function updatedSelectcity($val)
    {
        $this->states = region::where('city_id', $val)->get();
    }
    public function checkphone()
    {
        if (getsetting()->sms_active == 0) {
            $this->showotp = 3;
        } else {
            $otp = sendsms($this->client_fhonewhats);
            if ($otp === 1) {
                $this->showotp = 2;
            }
        }
        //    $this->dispatchBrowserEvent('sendOTP', ['phone' => '+2' .  $this->client_fhonewhats]);
    }
    public function verify()
    {
        if (getsetting()->sms_active == 0) {
            $this->showotp = 3;
        } else {
            $response = otp_check($this->client_fhonewhats, $this->code);
        }

        if ($response === 1) {
            $this->showotp = 3;
        }
    }
    public function registerion()
    {
        $this->validate();
        $user = User::create([
            'client_fhonewhats' =>  $this->client_fhonewhats,
            'client_name' =>  $this->namecust,
            'client_fhoneLeter' =>  $this->phone2,
            'region_id' =>  $this->selectstate,
            'categoryAPP' =>  $this->selectnashat,
        ]);
        Auth::guard('client')->login($user);
        if (Auth::guard('client')->check()) {
            return redirect()->intended('/');
        }
    }
    public function render()
    {
        return view('livewire.front.user.register')->layout('layouts.front-end.layout');
    }
}
