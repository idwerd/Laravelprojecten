@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>
        <h1>Login</h1>
        <form action="{{ route('users.authenticate') }}" method="POST">
            @csrf
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <p class="error">{{ $message }}</p>
                </span>
            @enderror
            <input id="email" name="email" placeholder="E-mail" type="email" value="{{ old('email') ?: null}}"/>
            
             @error('password')
                <span class="invalid-feedback" role="alert">
                    <p class="error">{{ $message }}</p>
                </span>
            @enderror
            <input id="password" name="password" placeholder="Password" type="password"/>
           
            <button type="submit">Log in</button>
        </form>
    </main>
    
@endsection