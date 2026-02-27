@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <h1>Add new item</h1>
    <form action="{{ route('items.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="description">Description:</label>
    <textarea id="description" name="description"></textarea>
    <br>
    <label for="category">Category:</label>
    <select name="category_id" id="category" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit">Save</button>
</form>
@endsection