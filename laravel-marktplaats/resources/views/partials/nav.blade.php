<nav>
    <ul>
            @guest 
                <li><a href="{{ route('adverts.index') }}">Home</a></li>
                <li><a class="secondary-btn" href="{{ route('account.login') }}">Inloggen</a></li>
                <li><a class="primary-btn" href="{{ route('account.register') }}">Registreren</a></li>
            @endguest

            @auth

            @endauth
    </ul>
</nav>