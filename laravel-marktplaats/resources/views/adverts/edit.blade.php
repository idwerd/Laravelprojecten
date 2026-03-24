@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <header>
        <h1>Bewerken</h1>
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


        <form action="{{ route('adverts.update', $advert->id) }}" class="form" id="create-form" method="POST" enctype="multipart/form-data">
            @csrf
            <input id="title" name="title" type="text" value="{{ $advert->title }}">
            <label for="title">Titel</label>

            <input id="image" name="image" type="file" accept="image/*">
            <label for="image">Afbeelding</label>

            <textarea id="description" name="description" type="text">{{ $advert->description }}</textarea>
            <label for="description">Beschrijving</label>

            <select id="category_id" name="category_id" >
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id === $advert->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                @endforeach
            </select>
            <label for="category_id">Categorie</label>

            <input id="price" name="price" type="number" step=".01" value="{{ $advert->price }}">
            <label for="price">Prijs</label>
            
            <button class="primary-btn" type="submit">Bijwerken</button>
        </form>
       
    </main>
@endsection