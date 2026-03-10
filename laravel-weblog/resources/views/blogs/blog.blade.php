@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>

        <section class="blogpost">
            <h1>{{ $blog->title }}</h1>
            
            <div class="metadata">
                <h3>{{ $blog->created_at }}</h3>
                
                @foreach($blog->category as $category)
                    <div>
                        <h3>{{ $category->name }}</h3>
                    </div>
                @endforeach
                
                
                <h3>Author</h3>
            </div>

            @if($blog->image)
                <img src="">
            @endif

            <div class="blogtext">
                {{ $blog->body }}
            </div>
        </section>
        
        <section class="commentsection">
            
            <form action="{{ route('comments.store', $blog->id) }}" method="POST">
                @csrf
                <textarea name="comment" id="comment" placeholder="Leave a comment!"></textarea>
                <button type="submit">Post your comment</button>
            </form>

            <div class="comments">
                <h2>Comments</h2>
                @if($comments->isEmpty())
                    <p>There are no comments yet. Be the first and leave a comment!</p>
                @else
                    @foreach($comments as $comment)
                        <div class="singlecomment">
                            <p class="username">Username</p>
                            <p>{{ $comment->body }}</p>
                            <p class="date">{{ $comment->created_at }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
        
    </main>
    
@endsection