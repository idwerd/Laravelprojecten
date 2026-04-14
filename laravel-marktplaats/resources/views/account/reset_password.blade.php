@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <header>
        <h1>Wachtwoord resetten</h1>
    </header>

    <main>
        <form action="" id="login-form" class="form" method="POST">
            @csrf
            
            <input name="email" id="email" type="email" placeholder="jan@example.com">
            <label for="email">E-mailadres</label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <p class="error">*{{ $message }}</p>
                </span>
            @enderror

            <button type="submit" class="primary-btn">Reset wachtwoord</button>
        </form>
    </main>
    
@endsection