@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <header>
        
    </header>

    <main id="advert">
        
        <div class="advert-info">
            <img src="{{ asset('storage/public/' . $advert->image) }}">
            <div>
                <h1>{{ $advert->title}}</h1>
                <p>{{ $advert->description }}</p>
            </div>
            
        </div>

        <div class="advert-data">
            <h2>Door</h2>
            <ul>
                <li>{{ $advert->user->name }}</li>
                <li>{{ $advert->created_at }}</li>
                <li>€{{ $advert->price }}</li>
            </ul>
        </div>

        <div class="advert-bids">
            <h2>Biedingen</h2>
            @foreach($bids as $bid)
                <p><strong>{{ $bid->user->name }}</strong> biedt <strong>€{{ $bid->price }}</strong>
            @endforeach

            @if($advert->user_id != Auth::id())
                <a href="#place-bid" class="primary-btn">Bieden</a>
            @endif
            <div id="place-bid" class="dialog">
                
                <div class="bid-form">
                    <a class="secondary-btn close-btn" href="#">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier"> 
                                <path d="M20.7457 3.32851C20.3552 2.93798 19.722 2.93798 19.3315 3.32851L12.0371 10.6229L4.74275 3.32851C4.35223 2.93798 3.71906 2.93798 3.32854 3.32851C2.93801 3.71903 2.93801 4.3522 3.32854 4.74272L10.6229 12.0371L3.32856 19.3314C2.93803 19.722 2.93803 20.3551 3.32856 20.7457C3.71908 21.1362 4.35225 21.1362 4.74277 20.7457L12.0371 13.4513L19.3315 20.7457C19.722 21.1362 20.3552 21.1362 20.7457 20.7457C21.1362 20.3551 21.1362 19.722 20.7457 19.3315L13.4513 12.0371L20.7457 4.74272C21.1362 4.3522 21.1362 3.71903 20.7457 3.32851Z" fill="#0F0F0F"></path> 
                            </g>
                        </svg>
                    </a>
                    <h2>Breng een bod uit</h2>
                    <form action="{{ route('adverts.bid', $advert) }}"class="form" method="POST">
                        @csrf
                        <input id="price" type="number" name="price" step="0,01" placeholder="10,00">
                        <label for="price">Jouw bod</label>
                        <button class="primary-btn">Bieden</button>
                    </form>

                </div>
            </div>
        </div>

        <div class="advert-message">
            <h2>Contacteer de verkoper</h2>
            <form action="{{ route('conversation.store', $advert->id) }}" method="POST">
                @csrf
                <textarea name="body">
                </textarea>
                <button type="submit" class="primary-btn">Stuur een bericht</button>
            </form>
        </div>


        </div>
    </main>
    
@endsection