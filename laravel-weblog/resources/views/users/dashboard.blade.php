@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>
        <h1>Welcome {{ $user->username}}!</h1>

        <h2>Subscription</h2>
        <section class="subscription">
            @if($user->premium) 
                <p>You are a premium member.</p>
                <a href="{{ route('blogs.premium') }}" class="button premium-btn">Premium content</a>
                <form action="{{ route('users.premium') }}" method="POST">
                    @csrf
                    <button class="downgrade-premium">Downgrade to free</button>
                </form>
            @else
                <p>You don't have access to premium content.</p>
                <form action="{{ route('users.premium') }}" method="POST">
                    @csrf
                    <button class="upgrade-premium premium-btn">Upgrade now!</button>
                </form>
            @endif
        </section>
        

        <h2>Your blogs</h2>
        <section>
            <a class="button" href="{{ route('categories.index') }}">Manage categories</a>

        </section>
        <section class="blogoverview">
            
            @if($blogs->isEmpty())
                <p>You don't have any blogs yet. Start blogging now!</p>
                <a class="button" href="{{ route('blogs.create') }}">Create new blog!</a>

            @else
                @foreach($blogs as $blog) 
                    <div class="blogpreview {{ $blog->premium === 1 ? 'premium' : null }}">
                        <div class="edit-buttons">
                            <a href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
                            <a href="#confirm-delete-{{ $blog->id }}">Delete</a>         
                        </div>
                        <a class="btn" href="{{ route('blogs.blog', $blog->id) }}" href="{{ route('blogs.blog', $blog->id) }}">
                            <h2>{{ $blog->title }}</h2>
                            <h3>{{ $blog->created_at }}</h3>
                        </a>

                        <div id="confirm-delete-{{ $blog->id }}" class="dialog">
                            <div class="delete">
                                <h2>Are you sure you want to delete <strong>{{ $blog->title }}</strong>?</h2>
                                <p>This can not be undone</p>
                                <div class="confirm-buttons">
                                    <form action="{{ route('blogs.delete', $blog->id) }}" method="POST">
                                        @csrf    
                                        <button class="delete-btn" type="submit">Delete</button>
                                    </form>
                                    <a class="button" href="#">Keep the post</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </section>
    </main>
    
@endsection