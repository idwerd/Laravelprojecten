@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <header>
        <h1>Marktplaats</h1>
    </header>

    <main>
        <form action="{{ route('adverts.filter') }}" method="POST">
            @csrf
            <select name="filter-category">
                <option value="" selected disabled hidden>Selecteer een categorie</option>
                
                @foreach($categories as $category)
                    <option name="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                
            </select>
            <button class="secondary-btn" type="submit">Filter</button>
            
        </form>
        
        @foreach($adverts as $advert)


            <a href="{{ route('adverts.advert', $advert) }}" class="advert-preview">
                <img class="thumbnail" src="{{ asset('/storage/public/' . $advert->image) }}" alt="{{ $advert->title }}">
                <div class="advert-info">
                    <h3>{{ $advert->title }}</h3>
                    <p>Aangeboden door {{ $advert->user->name }} sinds {{ $advert->created_at }}</p>
                </div>
                <div class="advert-description">
                    <p>{{ $advert->description }}</p>
                </div>
                <div class="advert-data">
                    <h3>€{{ $advert->price }}</h3>
                </div>
            </a>

        @endforeach
    </main>
@endsection