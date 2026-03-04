@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>
        <h1>Create new blog</h1>
        <form action="{{ route('blogs.store') }}" method="POST">
            @csrf
            <input id="title" name="title" placeholder="Title"/>
            <input type="file" name="image"/>
            <textarea id="body" name="body" placeholder="Blogpost"></textarea>
            <button type="submit">Save</button>
        </form>
    </main>
    
@endsection