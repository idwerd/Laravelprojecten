<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $validated = $request->validated();
        $new_user = User::create($validated);

        $new_user->password = Hash::make($validated['password']);
        Auth::login($new_user);
       
        return redirect()->route('/account/dashboard');
    }
}
