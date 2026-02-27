@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

<h1>Items</h1>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->category->name }}</td>
                <td>
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('items.edit', $item->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection