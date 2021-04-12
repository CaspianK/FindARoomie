<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}">
    <title>FindARoomie - Home</title>
</head>
<body>
    <header class="header">
        <div class="container header__container">
            <div>
                <a href="{{ route('home') }}" class="logo link text">FindARoomie!</a>
            </div>
            <ul class="nav">
                    <li>
                        <form action="">
                            <select name="city"  class="nav__city text" onchange="this.form.submit()">
                                <option value="Almaty">Almaty</option>
                                <option value="Astana">Astana</option>
                                <option value="Shymkent">Shymkent</option>
                            </select>
                        </form>
                    </li>
                    <li><a href="{{ url('/en') }}" class="nav__lang link text">kazakca</a></li>
                @auth
                    <li><a href="#" class="nav__main link text">Bookmarks</a></li>
                    <li><a href="{{ url('/profile') }}" class="nav__main link text">Profile</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="nav__main link text">Sign In</a></li>
                @endauth
            </ul>
        </div>
    </header>
    <div class="intro">
        <div class="container intro__container">
            <div class="intro__text text">
                <div class="intro__welcome">
                    <h1>Broke and lonely?</h1>
                    <p>FindARoomie! is what will help you. Post your 'room' so that you can find someone to share it with! Or if you don't have one yet - find it with us! It's easy, you'll like it!</p>
                </div>
                <div class="intro__buttons">
                    <a href="" class="link text">Find a room</a>
                    <a href="" class="link text">Post a room</a>
                </div>
            </div>
            <div><img src="{{ url('storage/images/home.png') }}" alt="" class="intro__picture"></div>
        </div>
    </div>
    <div class="main">
        <div class="container main__container">
            <h2 class="text">See available rooms in Astana</h2>
            <div class="rooms">
                <div class="room">
                    <div class="room__image" style="background-image: url('/storage/temp/1.jpg');"></div>
                    <div class="room__text">
                        <h3 class="text">Looking for a Pisces</h3>
                        <p class="room__address text">Kabanbay Batyr 42</p>
                        <div class="room__last">
                            <p class="text room__owner">Nina Aksay</p>
                            <form action="">
                                <button class="room__bookmark" type="submit"></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="room">
                    <div class="room__image" style="background-image: url('/storage/temp/1.jpg');"></div>
                    <div class="room__text">
                        <h3 class="text">Looking for a Pisces</h3>
                        <p class="room__address text">Kabanbay Batyr 42</p>
                        <div class="room__last">
                            <p class="text room__owner">Nina Aksay</p>
                            <form action="">
                                <button class="room__bookmark" type="submit"></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="room">
                    <div class="room__image" style="background-image: url('/storage/temp/1.jpg');"></div>
                    <div class="room__text">
                        <h3 class="text">Looking for a Pisces</h3>
                        <p class="room__address text">Kabanbay Batyr 42</p>
                        <div class="room__last">
                            <p class="text room__owner">Nina Aksay</p>
                            <form action="">
                                <button class="room__bookmark" type="submit"></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="room">
                    <div class="room__image" style="background-image: url('/storage/temp/1.jpg');"></div>
                    <div class="room__text">
                        <h3 class="text">Looking for a Pisces</h3>
                        <p class="room__address text">Kabanbay Batyr 42</p>
                        <div class="room__last">
                            <p class="text room__owner">Nina Aksay</p>
                            <form action="">
                                <button class="room__bookmark" type="submit"></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="room">
                    <div class="room__image" style="background-image: url('/storage/temp/1.jpg');"></div>
                    <div class="room__text">
                        <h3 class="text">Looking for a Pisces</h3>
                        <p class="room__address text">Kabanbay Batyr 42</p>
                        <div class="room__last">
                            <p class="text room__owner">Nina Aksay</p>
                            <form action="">
                                <button class="room__bookmark" type="submit"></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="room">
                    <div class="room__image" style="background-image: url('/storage/temp/1.jpg');"></div>
                    <div class="room__text">
                        <h3 class="text">Looking for a Pisces</h3>
                        <p class="room__address text">Kabanbay Batyr 42</p>
                        <div class="room__last">
                            <p class="text room__owner">Nina Aksay</p>
                            <form action="">
                                <button class="room__bookmark" type="submit"></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="room">
                    <div class="room__image" style="background-image: url('/storage/temp/1.jpg');"></div>
                    <div class="room__text">
                        <h3 class="text">Looking for a Pisces</h3>
                        <p class="room__address text">Kabanbay Batyr 42</p>
                        <div class="room__last">
                            <p class="text room__owner">Nina Aksay</p>
                            <form action="">
                                <button class="room__bookmark" type="submit"></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="room">
                    <div class="room__image" style="background-image: url('/storage/temp/1.jpg');"></div>
                    <div class="room__text">
                        <h3 class="text">Looking for a Pisces</h3>
                        <p class="room__address text">Kabanbay Batyr 42</p>
                        <div class="room__last">
                            <p class="text room__owner">Nina Aksay</p>
                            <form action="">
                                <button class="room__bookmark" type="submit"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container header__container">
            <div>
                <a href="{{ route('home') }}" class="logo link link_light text text_light">FindARoomie!</a>
            </div>
            <ul class="nav">
                <li><a href="#" class="nav__main link link_light text text_light">Instagram</a></li>
                <li><a href="#" class="nav__main link link_light text text_light">Spotify</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>