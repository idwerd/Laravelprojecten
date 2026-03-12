@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>
        <h1>401: This content is for subscribed members only.</h1>
        <form action="{{ route('users.login') }}" method="GET">
            @csrf
            <button type="submit">Login</button>
        </form>
    </main>
 
@endsection