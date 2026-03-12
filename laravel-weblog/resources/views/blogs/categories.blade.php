@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <main>
        <h1>Manage categories</h1>

        <h2>Categories</h2>
        <section class="categories">
            <ul>
                @foreach($categories as $category)
                    <li>{{ $category->name }}</li>
                @endforeach
            </ul>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <label>Add new category</label>
                <input name="new-category" id="new-category" placeholder="New category">
                <button type="submit">Add category</button>
            </form>




        </section>
        
    </main>
    

@endsection