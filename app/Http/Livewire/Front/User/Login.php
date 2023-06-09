<?php

namespace App\Http\Livewire\Front\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Providers\RouteServiceProvider;
use SebastianBergmann\Type\ObjectType;

class Login extends Component
{
    public $client_fhonewhats, $showotp = false, $user;
    public $success;
    protected $listeners = [
        'success' => 'success1', 'verify' => 'verify'
    ];
    protected $rules = [
        'client_fhonewhats' => 'required|exists:users',
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
        $this->validate();
        $this->user = User::where('client_fhonewhats', $this->client_fhonewhats)->first();
        $this->dispatchBrowserEvent('sendOTP', ['phone' => '+2' .  $this->user->client_fhonewhats]);
    }
    public function verify()
    {
        Auth::guard('client')->login($this->user);
        if (Auth::guard('client')->check()) {
            return redirect()->intended('/');
        }
    }
    public function render()
    {

        return view('livewire.front.user.login')->layout('layouts.front-end.layout');
    }
}
