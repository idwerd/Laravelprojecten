@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>

        @include('partials.goback')

        <h1>Create new blog</h1>

        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input id="title" name="title" placeholder="Title"/>
            <input type="file" name="image" accept="image/*"/>
            <label>Categories</label>
            <select name="category_id[]" id="category_id" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <label>Premium content</label>
            <select name="premium" id="premium">
                <option value="0">Free</option>
                <option value="1">Premium</option>
            </select>
            <textarea id="body" name="body" placeholder="Blogpost"></textarea>
            <button type="submit">Save</button>
        </form>
    </main>
    
@endsection