@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <header>
        <h1>Inloggen</h1>
    </header>

    <main>
        <form action="{{ route('login.auth') }}" id="login-form" class="form" method="POST">
            @csrf
            
            <input name="email" id="email" type="email" placeholder="jan@example.com">
            <label for="email">E-mailadres</label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <p class="error">*{{ $message }}</p>
                </span>
            @enderror
            
            <input name="password" id="password" type="password" placeholder="wachtwoord">
            <label for="password">Wachtwoord</label>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <p class="error">*{{ $message }}</p>
                </span>
            @enderror

            <a href="">Wachtwoord vergeten</a>

            <button type="submit" class="primary-btn">Login</button>
        </form>
    </main>
    
@endsection