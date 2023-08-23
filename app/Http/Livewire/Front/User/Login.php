<?php

namespace App\Http\Livewire\Front\User;

use App\Models\Otp;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Login extends Component
{
    public $client_fhonewhats, $showotp = false, $user,$code;
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
    ];
    public function success1($value)
    {
        if (!is_null($value))
            $this->success = $value;
    }
    public function login()
    {
        // dd(DB::getDefaultConnection());
        $this->validate();
        $otp = sendsms($this->client_fhonewhats);
        if ($otp === 1) {
            $this->showotp = true;
        }

        // $this->dispatchBrowserEvent('sendOTP', ['phone' => '+2' .  $this->user->client_fhonewhats]);
    }
    public function verify()
    {
        // $votp =  Otp::where('code',$this->code )->first();
        $response = otp_check($this->client_fhonewhats,$this->code  );
        if( $response === 1){
            $this->user = User::where('client_fhonewhats', $this->client_fhonewhats)->first();
            Auth::guard('client')->login($this->user);
            if (Auth::guard('client')->check()) {
                return redirect()->intended('/');
            }
        }else{
            return Resp('', 'كود التحقق خطاء', 302, false);
        }

    }
    public function render()
    {

        return view('livewire.front.user.login')->layout('layouts.front-end.layout');
    }
}
