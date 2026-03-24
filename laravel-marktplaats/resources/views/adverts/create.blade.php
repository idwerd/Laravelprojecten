@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <header>
        <h1>Toevoegen</h1>
    </header>

    <main>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('adverts.store') }}" class="form" id="create-form" method="POST" enctype="multipart/form-data">
            @csrf
            <input id="title" name="title" type="text" placeholder="">
            <label for="title">Titel</label>

            <input id="image" name="image" type="file" accept="image/*">
            <label for="image">Afbeelding</label>

            <textarea id="description" name="description" type="text" ></textarea>
            <label for="description">Beschrijving</label>

            <select id="category_id" name="category_id" >
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <label for="category_id">Categorie</label>

            <input id="price" name="price" type="number" step=".01">
            <label for="price">Prijs</label>
            
            <button class="primary-btn" type="submit">Plaatsen</button>
        </form>
       
    </main>
@endsection