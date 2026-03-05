@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>

        <section class="blogpost">
            <h1>{{ $blog->title }}</h1>
            
            <div class="metadata">
                <h3>{{ $blog->created_at }}</h3>
                
                <h3>{{ $blog->category->name }}</h3>
                
                <h3>Author</h3>
            </div>

            <div class="blogtext">
                {{ $blog->body }}
            </div>
        </section>
        
        <section class="commentsection">
            <h2>Comments</h2>
            <form action="{{ route('comments.store', $blog->id) }}" method="POST">
                <textarea name="comment" id="comment" placeholder="Leave a comment!"></textarea>
                <button type="submit">Post your comment</button>
            </form>
        </section>
        
    </main>
    
@endsection