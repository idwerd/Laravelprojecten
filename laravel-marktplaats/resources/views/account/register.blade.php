@extends('layouts.app')

@section('title', 'Registreren')

@section('content')

    <header>
        <h1>Maak een account aan</h1>

    </header>

    <main>
        <form action="" class="form" method="POST">
            @csrf
            <input type="text" id="name" name="name" placeholder="Jan">
            <label for="name">Naam</label>

            <input type="text" id="email" name="email" placeholder="jan@example.com">
            <label>E-mailadres</label>

            <input type="password" id="password" name="password" placeholder="wachtwoord">
            <label>Wachtwoord</label>

            <button class="primary-btn">Registreer</button>
        </form>
    </main>
    
@endsection