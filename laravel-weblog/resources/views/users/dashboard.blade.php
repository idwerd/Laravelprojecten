@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>
        <h1>Welcome!</h1>

        <h2>Your blogs</h2>
        <section class="blogoverview">
            
            @if($blogs->isEmpty())
                <p>You don't have any blogs yet. Start blogging now!</p>
                <a class="button" href="{{ route('blogs.create') }}">Create new blog!</a>

            @else
                @foreach($blogs as $blog) 
                    <a class="blogpreview" href="{{ route('blogs.blog', $blog->id) }}">
                        <div class="edit-buttons">
                            <a href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
                            <a href="{{ route('blogs.delete', $blog->id) }}">Delete</a>
                        </div>
                        <h2>{{ $blog->title }}</h2>
                        <h3>{{ $blog->created_at }}</h3>
                    </a>
                @endforeach
            @endif
        </section>
    </main>
    
@endsection