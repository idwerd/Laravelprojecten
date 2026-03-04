@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>
        <h1>Log in</h1>
        <form >
            @csrf
            <input id="username" name="username" placeholder="Username" type="text"/>
            <input id="password" name="password" placeholder="Password" type="password"/>
            <button type="submit">Log in</button>
        </form>
    </main>
    
    

@endsection