@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>

        @include('partials.goback')

        <h1>Edit: {{ $blog->title }}</h1>

        <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
            @csrf
            <input id="title" name="title" placeholder="Title" value="{{ $blog->title }}"/>
            <input type="file" name="image"/>
            <label>Categories</label>
            <select name="category_id[]" id="category_id" multiple required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $blog->category->contains($category->id) ? 'selected' : null }}>{{ $category->name }}</option>
                @endforeach
            </select>
            <label>Premium content</label>
            <select name="premium" id="premium">
                <option value="0" {{ $blog->premium === 0 ? 'selected' : null }}>Free</option>
                <option value="1" {{ $blog->premium === 1 ? 'selected' : null }}>Premium</option>
            </select>
            <textarea id="body" name="body" placeholder="Blogpost">{{ $blog->body }}</textarea>
            <button type="submit">Save</button>
        </form>
    </main>
    
@endsection