@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>
        <h1>This content is for premium users only.</h1>
        <form action="{{ route('users.premium') }}" method="POST">
            @csrf
            <button type="submit">Upgrade now!</button>
        </form>
    </main>
 
@endsection