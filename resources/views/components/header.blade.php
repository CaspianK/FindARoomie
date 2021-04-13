<header class="header">
    <div class="container header__container">
        <div>
            <a href="{{ route('home') }}" class="logo link text">FindARoomie!</a>
        </div>
        <ul class="nav">
                <li>
                    <form action="">
                        <select name="city"  class="nav__city text" onchange="this.form.submit()">
                            @foreach ($cities as $name => $id)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </form>
                </li>
                <li><a href="{{ url('/en') }}" class="nav__lang link text">kazakca</a></li>
            @auth
                <li><a href="#" class="nav__main link text">Bookmarks</a></li>
                <li><a href="{{ url('/profile') }}" class="nav__main link text">Profile</a></li>
            @else
                <li><a href="{{ route('signin') }}" class="nav__main link text">Sign In</a></li>
            @endauth
        </ul>
    </div>
</header>