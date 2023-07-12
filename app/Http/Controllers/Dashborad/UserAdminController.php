<?php

namespace App\Http\Controllers\Dashborad;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class UserAdminController extends Controller
{
    public function login()
    {

        return view('auth.login');
    }
    public function postlogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/admin/dashborad');
        }
        return back()->withInput($request->only('username', 'remember'));
    }
    public function adminlogout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        return redirect('/admin/dashborad/login');
    }
    public function clientlogout(Request $request)
    {
        Auth::guard('client')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
