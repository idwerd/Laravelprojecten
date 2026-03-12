@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>
        <h1>Premium content</h1>

        <section class="blogoverview">

            @foreach($blogs as $blog) 
                
                <a class="blogpreview premium" href="{{ route('blogs.blog', $blog->id) }}">
                    <h2>{{ $blog->title }}</h2>
                    <h3>{{ $blog->created_at }}</h3>
                </a>
            
            @endforeach
        </section>
     
    </main>
    

@endsection