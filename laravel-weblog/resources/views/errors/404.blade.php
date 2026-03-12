@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>
        <h1>404: This page doesn't exist</h1>
        <form action="{{ route('blogs') }}" method="GET">
            @csrf
            <button type="submit">Blog overview</button>
        </form>
    </main>
 
@endsection