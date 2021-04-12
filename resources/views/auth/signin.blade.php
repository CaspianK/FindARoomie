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
    <x-header></x-header>
    <div class="main_signin">
        <div class="container main_signin__container">
            <div class="main_signin__wrapper">
                <form action="{{ route('signin') }}" class="signin" method="POST">
                    @csrf
                    <x-auth-session-status :status="session('status')" />
                    <x-auth-validation-errors :errors="$errors" />
                    <label for="email" class="text">Email</label>
                    <input type="email" name="email" class="text" required autofocus>
                    <label for="password" class="text">Password</label>
                    <input type="password" name="password" class="text" required autocomplete="current-password">
                    <div class="signin__checkbox">
                        <input type="checkbox" name="remember" class="signin__remember">
                        <label for="remember" class="text">Remember me</label>
                    </div>
                    <div class="signin__last">
                        <a class="text signin__btn link" id="forgot_btn" href="{{ route('password.request') }}">Forgot password?</a>
                        <button type="submit" class="text btn">Log In</button>
                    </div>
                </form>
                <a href="{{ route('signup') }}" class="link text signin__btn signin__btn_member" id="member_login">Not a member yet?</a>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</body>
</html>