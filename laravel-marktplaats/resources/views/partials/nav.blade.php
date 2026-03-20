<nav>

    <ul class="nav-left">
        <li><a class="secondary-btn" href="{{ route('adverts.index') }}">Home</a></li>
    </ul>
    

    <ul class="nav-right">
        @guest 
            <li><a class="secondary-btn" href="{{ route('account.login') }}">Inloggen</a></li>
            <li><a class="secondary-btn" href="{{ route('account.register') }}">Registreren</a></li>
        @endguest

        @auth
            <li><a class="secondary-btn" href="{{ route('account.dashboard') }}">dashboard</a></li>
            <li><a class="secondary-btn" href="{{ route('account.logout') }}">Logout</a></li>
        @endauth
    </ul>
            

</nav>