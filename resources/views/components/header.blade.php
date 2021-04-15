<header class="header">
    <div class="container header__container">
        <div>
            <a href="{{ route('home') }}" class="logo link text">FindARoomie!</a>
        </div>
        <ul class="nav">
                <li>
                    <form action="{{ route('city') }}" method="POST">
                        @csrf
                        <select name="city"  class="nav__city text" onchange="this.form.submit()">
                            <option value="" selected disabled hidden>{{ session('city') }}</option>
                            @foreach ($cities as $name => $id)
                                <option value="{{ $name }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </form>
                </li>
                @if (session()->get('locale') == 'kk')
                    <li><a href="{{ url('/en') }}" class="nav__lang link text">english</a></li>
                @else
                    <li><a href="{{ url('/kk') }}" class="nav__lang link text">kazakca</a></li>
                @endif
            @auth
                <li><a href="{{ route('bookmarks') }}" class="nav__main link text">{{__("Bookmarks")}}</a></li>
                <li><a href="{{ url('/profile') }}" class="nav__main link text">{{__("Profile")}}</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a href="{{ route('logout') }}" method="POST" class="nav__main link text" onclick="event.preventDefault(); this.closest('form').submit();">{{__("Log Out")}}</a>
                    </form>
                </li>
            @else
                <li><a href="{{ route('signin') }}" class="nav__main link text">{{__("Sign In")}}</a></li>
            @endauth
        </ul>
    </div>
</header>