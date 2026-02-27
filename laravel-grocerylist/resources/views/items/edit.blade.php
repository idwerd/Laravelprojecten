@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <h1>Edit item</h1>
    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $item->name }}" required>
        <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ $item->description }}</textarea>
        <br>
        <label for="category">Category:</label>
        <select name="category_id" id="category" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Save</button>
    </form>
@endsection