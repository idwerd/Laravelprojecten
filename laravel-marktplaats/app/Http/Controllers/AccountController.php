<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Advert;
use App\Models\Conversation;
use Illuminate\Http\RedirectResponse;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $user = Auth::user();
        $adverts = Advert::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        $conversations = Conversation::where('user_id', Auth::id());

        return view('account.dashboard', compact('adverts', 'user', 'conversations'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/account/login');
    }

    
}
