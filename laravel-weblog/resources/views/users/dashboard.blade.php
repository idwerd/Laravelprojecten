@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>
        <h1>Welcome!</h1>

        <h2>Subscription</h2>
        <section>
            @if($premium) 
                <p>You are a premium member</p>
                <a>downgrade to free</a>
            @else
                <p>You don't have access to premium content</p>
                <button>Upgrade now!</button>
            @endif
        </section>
        

        <h2>Your blogs</h2>
        <section class="blogoverview">
            
            @if($blogs->isEmpty())
                <p>You don't have any blogs yet. Start blogging now!</p>
                <a class="button" href="{{ route('blogs.create') }}">Create new blog!</a>

            @else
                @foreach($blogs as $blog) 
                    <div class="blogpreview {{ $blog->premium === 1 ? 'premium' : null }}">
                        <div class="edit-buttons">
                            <form action="{{ route('blogs.edit', $blog->id) }}" method="GET">
                                <button type="submit">Edit</button>
                            </form>
                            <form method="dialog">
                                <button command="show-model" commandfor="delete-dialog">Delete</button>
                            </form>
                                                       
                        </div>
                        <a class="btn" href="{{ route('blogs.blog', $blog->id) }}" href="{{ route('blogs.blog', $blog->id) }}">
                            <h2>{{ $blog->title }}</h2>
                            <h3>{{ $blog->created_at }}</h3>
                        </a>
                    </div>
                @endforeach
            @endif

            <dialog id="delete-dialog">
                <p>Are you sure you want to delete {{ $blog->title }}?</p>
                <p>This can not be undone</p>
                <form action="{{ route('blogs.delete', $blog->id) }}" method="POST">
                    <button type="submit">Delete</button>
                </form>
                <form>
                    <button commandfor="delete-dialog" command="close">Keep blogpost</button>
                </form>
            </dialog>
        </section>
    </main>
    
@endsection