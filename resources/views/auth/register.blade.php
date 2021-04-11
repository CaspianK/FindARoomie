<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}">
    <title>Find A Roomie!</title>
</head>
<body>
    <header>
        <div class="container container_header">
            <div class="logo">
                <a href="{{ route('home') }}">Find A Roomie!</a>
            </div>
            <ul class="nav">
                @auth
                    <li><a href="{{ url('/profile') }}">Profile</a></li>
                    <li><a href="#">Bookmarks</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST"><button type="submit">Log Out</button></form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Log In</a></li>
                    <li><a href="{{ route('register') }}">Sign Up</a></li>
                @endauth
            </ul>
        </div>
    </header>
    <div class="content">
        <!-- <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('register') }}" class="signup">
            @csrf
            <h1>Sign Up</h1>
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" autocomplete="new-password" required>
            <input type="password" name="password_confirmation" placeholder="Password again" autocomplete="new-password" required>
            <button type="submit">Signup</button>
        </form> -->
    </div>
    <footer>
        <div class="container container_header">
            <div class="logo">
                <a href="{{ route('home') }}">Find A Roomie!</a>
            </div>
            <ul class="nav">
                <li><a href="{{ url('/profile') }}">Instagram</a></li>
                <li><a href="#">Twitter</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>