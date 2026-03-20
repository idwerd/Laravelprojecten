@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <header>
        <h1>Marktplaats</h1>
    </header>

    <main>
        @foreach($adverts as $advert)
            <div class="advert-preview">
                <img class="thumbnail" src="{{ asset('/storage/' . $advert->image) }}" alt="{{ $advert->title }}">
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
            </div>
        @endforeach
    </main>
@endsection