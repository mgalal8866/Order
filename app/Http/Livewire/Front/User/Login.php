<?php

namespace App\Http\Livewire\Front\User;

use App\Models\Otp;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Login extends Component
{
    public $client_fhonewhats, $showotp = false, $user, $code,$password,$remember;
    public $success;

    protected $listeners = [
        'success' => 'success1'
    ];
    protected $rules = [
        'client_fhonewhats' => 'required|exists:tenant.users',
    ];
    protected $messages = [
        'client_fhonewhats.exists' => 'رقم الهاتف غير مسجل يمكنك تسجيل مستخدم جديد',
        'client_fhonewhats.required' => 'رقم الهاتف مطوب',
        'password.required' => 'الباسورد مطوب',
    ];
    public function success1($value)
    {
        if (!is_null($value))
            $this->success = $value;
    }
    public function login()
    {
        $validated = $this->validate([
            'client_fhonewhats' => 'required|exists:users,client_fhonewhats',
            'password' => 'required|min:6',
        ]);

         Auth::guard('client')->attempt(['client_fhonewhats' => $this->client_fhonewhats, 'password' => $this->password ]);
        if (Auth::guard('client')->check()) {
            return redirect()->intended('/');
        }else{
            session()->flash('error', 'اسم المستخدم أو كلمة المرور غير صحيحة.');
        }
        // $this->validate();
        // if (getsetting()->sms_active == 0) {
        //     $this->verify();
        // } else {
        //     $otp = sendsms($this->client_fhonewhats);
        //     if ($otp === 1) {
        //         $this->showotp = true;
        //     }
        // }
        // $this->dispatchBrowserEvent('sendOTP', ['phone' => '+2' .  $this->user->client_fhonewhats]);
    }
    public function verify()
    {
        // if (getsetting()->sms_active == 0) {
        //     $response = 1;
        // } else {
        //     $response = otp_check($this->client_fhonewhats, $this->code);
        // }


        // if ($response === 1) {
        //     $this->user = User::where('client_fhonewhats', $this->client_fhonewhats)->first();
        //     Auth::guard('client')->login($this->user);
        //     if (Auth::guard('client')->check()) {
        //         return redirect()->intended('/');
        //     }
        // } else {
        //     return Resp('', 'كود التحقق خطاء', 302, false);
        // }
    }
    public function render()
    {

        return view('livewire.front.user.login')->layout('layouts.front-end.layout');
    }
}
