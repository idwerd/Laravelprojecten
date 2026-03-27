@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <header>
        <h1>Marktplaats</h1>
    </header>

    <main id="homepage">
        <div class="search-options">

            <form action="{{ route('adverts.filter') }}" method="POST" class="filter-form">
                @csrf
                <select name="filter-category">
                    <option value="0">Alles bekijken</option>
                    
                    @foreach($categories as $category)
                        <option name="{{ $category->id }}" value="{{ $category->id }}"
                            @if(isset($filter_category))
                                {{ $category->id == $filter_category ? 'selected' : null }}
                            @endif
                        >{{ $category->name }}</option>
                    @endforeach
                    
                </select>
                <button class="secondary-btn" type="submit">Filter</button>
            </form>

            <form action="{{ route('adverts.search') }}" method="POST" class="search-form">
                @csrf
                <input name="search" placeholder="Zoeken...">
                <button class="secondary-btn" type="submit">Zoeken</button>
                <a class="link" href="{{ route('adverts.index') }}">Reset</a>
            </form>

            
        </div>

        <div class="adverts">

            @foreach($paginatedAdverts as $advert)

                <a href="{{ route('adverts.advert', $advert) }}" class="advert-preview">
                    <img class="thumbnail" src="{{ asset('/storage/public/' . $advert->image) }}" alt="{{ $advert->title }}">
                    <div class="advert-info">
                        <h3>{{ $advert->promote === 1 ? '*' : ''}}{{ $advert->title }}</h3>
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


        </div>

        <div class="pagination">
            {{ $paginatedAdverts->links() }}
        </div>

        <!--{//!! $adverts->render() !!}-->
    </main>
@endsection