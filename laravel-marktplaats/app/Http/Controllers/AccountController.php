<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Advert;
use App\Models\Message;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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

        $conversations = $user->conversations()->with('messages')->get();
    
        return view('account.dashboard', compact('adverts', 'user', 'conversations'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/account/login');
    }

    public function reset_password()
    {
        return view('account.reset_password');
    }
    
    public function confirm_reset_password(ResetPasswordRequest $request)
    {
        $validated = $request->validated();
        $user = User::where('email', $validated['email'])->get();
        dd($user);
        Mail::to($user)->send(new ResetPassword($user));
        return view('account.confirm_reset_password');
    }
}
