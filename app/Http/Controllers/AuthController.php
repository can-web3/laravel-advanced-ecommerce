<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $inputs = $request->only(['full_name', 'email', 'phone', 'password']);

        User::create($inputs);

        return $this->success('getLogin', 'Kayıt başarılı');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $inputs = $request->only(['email', 'password']);
        $remember_me = $request->has('remember_me');

        if (auth()->attempt($inputs, $remember_me)) {
            session()->regenerate();

            if(auth()->user()->hasRole('admin'))
                return $this->success('panel.getDashboard', 'Giriş başarılı');

        }

        return $this->error('getLogin', 'Geçersiz e-posta veya parola');
    }

    public function getLogout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $this->success('getLogin', 'Çıkış başarılı');
    }
}
