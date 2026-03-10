<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{   
    public function authenticate(Request $request): RedirectResponse {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('users.dashboard');
        }
        
        return back()->withErrors([
            'email' => 'The provided email is incorrect.',
            'password' => 'The provided password is incorrect.',
        ])->onlyInput('email');
    }

    public function login() {
        return view('users.login');
    }

    public function logout(Request $request): RedirectResponse {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
