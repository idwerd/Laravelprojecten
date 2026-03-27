<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Advert;
use Illuminate\Http\RedirectResponse;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $adverts = Advert::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        $user = Auth::user();
        return view('account.dashboard', compact('adverts', 'user'));
    }

    /*
    public function login()
    {
        return view('account.login');
    }
    */
    /*
    public function register()
    {
        return view('account.register');
    }
    */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/account/login');
    }

    
}
