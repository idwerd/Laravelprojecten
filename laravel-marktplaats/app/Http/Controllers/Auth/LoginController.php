<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(LoginRequest $request): RedirectResponse 
    {

        $credentials = $request->validated();
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/account/dashboard');
        }
 
        return back()->withErrors([
            'email' => 'Het opgegeven e-mailadres is incorrect',
            'password' => 'Het opgegeven wachtwoord is incorrect'
        ])->onlyInput('email');

    }
}
