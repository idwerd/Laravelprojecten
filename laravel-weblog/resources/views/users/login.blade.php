@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>
        <h1>Login</h1>
        <form action="{{ route('users.authenticate') }}" method="POST">
            @csrf
            <input id="email" name="email" placeholder="E-mail" type="text"/>
            <input id="password" name="password" placeholder="Password" type="password"/>
            <button type="submit">Log in</button>
        </form>
    </main>
    
@endsection