@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>
        <h1>Blog overview</h1>
        
        <label>Filter</label>
        <select name="category_id[]" class="filter-categories" multiple>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        
        <section class="blogoverview">
            @foreach($blogs as $blog) 
                @if( $haspremium === false && $blog->premium === 1)
                    @continue
                @else
                    <a class="blogpreview {{ $blog->premium === 1 ? 'premium' : null }}" href="{{ route('blogs.blog', $blog->id) }}">
                        <h2>{{ $blog->title }}</h2>
                        <h3>{{ $blog->created_at }}</h3>
                    </a>
                @endif
            @endforeach
        </section>

    </main>
    

@endsection