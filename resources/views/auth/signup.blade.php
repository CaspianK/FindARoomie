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
            <div class="main_signin__wrapper" id="signup">
                <form action="{{ route('signup') }}" class="signin" method="POST">
                    @csrf
                    <x-auth-validation-errors :errors="$errors" />
                    <label for="first_name" class="text">First Name</label>
                    <input type="text" name="first_name" class="text" required autofocus>
                    <label for="last_name" class="text">Last Name</label>
                    <input type="text" name="last_name" class="text" required>
                    <label for="email" class="text">Email</label>
                    <input type="email" name="email" class="text" required>
                    <label for="password" class="text">Password</label>
                    <input type="password" name="password" class="text" required autocomplete="new-password">
                    <label for="password_confirmation" class="text">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="text" required>
                    <div class="signin__last">
                        <button type="submit" class="text btn">Sign Up</button>
                    </div>
                </form>
                <a href="{{ route('signin') }}" class="link text signin__btn signin__btn_member" id="member_signup">Already a member?</a>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</body>
</html>