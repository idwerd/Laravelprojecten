<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Mail\ConfirmRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $validated = $request->validated();
        $new_user = User::create($validated);

        $new_user->password = Hash::make($validated['password']);

        Mail::to($new_user)->send(new ConfirmRegistration($new_user));
        Log::info('E-mail verstuurd naar: ' . $new_user->email);

        Auth::login($new_user);
       
        return redirect()->route('account.dashboard');
    }
}
