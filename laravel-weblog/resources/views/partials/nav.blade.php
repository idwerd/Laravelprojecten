<nav>
    <ul>
        <div class="mainmenu">
            <li><a href="{{ route('blogs.index') }}">Blogs overview</a></li>

            @auth
                @if(Auth::user()->premium)
                    <li><a href="{{ route('blogs.premium') }}">Premium content</a></li>  
                @endif
            @endauth
                      
        </div>
       <div class="users">

            @guest
                <li><a href="{{ route('users.login') }}">Login</a></li>
            @endguest

            @auth
                <li><a href="{{ route('blogs.create') }}">Create new blog</a></li>
                <li><a href="{{ route('users.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('users.logout') }}">Logout</a></li>
            @endauth

       </div>
    </ul>
</nav>