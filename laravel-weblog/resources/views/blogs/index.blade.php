@extends('layouts.app')

@section('title', 'Page Title')

@php
    $filter_category = session('filter_category');
@endphp

@section('content')

    <main>
        <h1>Blog overview</h1>
        
        <form action="{{ route('categories.filter') }}" id="filter-dropdown" method="POST">
            @csrf
            <select name="filter-categories[]" class="filter-categories" size="1" multiple>
                    <optgroup label="Categories">
                    <option value="" selected disabled hidden>Filter on catergory</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                        
                            @if($filter_category)
                                {{ in_array($category->id, $filter_category) ? 'selected' : null }}
                            @endif
                            
                        >{{ $category->name }}</option>
                    @endforeach
                    <button type="submit">Filter</button>
            </select>
        </form>
        
        <section class="blogoverview">

            @foreach($blogs as $blog) 
                
                @if(!$filter_category || $blog->category->contains(function($category) use ($filter_category) {
                    return in_array($category->id, $filter_category);
                }))
                    <a class="blogpreview {{ $blog->premium === 1 ? 'premium' : null }}" href="{{ route('blogs.blog', $blog->id) }}">
                        <h2>{{ $blog->title }}</h2>
                        <h3>{{ $blog->created_at }}</h3>
                    </a>
                @endif
            @endforeach
        </section>

    </main>
    

@endsection