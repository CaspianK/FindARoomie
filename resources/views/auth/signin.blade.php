<!DOCTYPE html>
<html lang="en">
<x-head-meta :title="__('Sign In')"></x-head-meta>
<body>
    <x-header></x-header>
    <div class="main main_signin">
        <div class="container main_signin__container">
            <div class="main_signin__wrapper">
                <form action="{{ route('signin') }}" class="signin" method="POST">
                    @csrf
                    <x-auth-session-status :status="session('status')" />
                    <x-auth-validation-errors :errors="$errors" />
                    <label for="email" class="text">{{__("Email")}}</label>
                    <input type="email" id="email" name="email" class="text" required autofocus>
                    <label for="password" id="password" class="text">{{__("Password")}}</label>
                    <input type="password" name="password" class="text" required autocomplete="current-password">
                    <div class="signin__checkbox">
                        <input type="checkbox" id="remember" name="remember" class="signin__remember">
                        <label for="remember" class="text">{{__("Remember me")}}</label>
                    </div>
                    <div class="signin__last">
                     <!--   <a class="text signin__btn link" id="forgot_btn" href="{{ route('password.request') }}">{{__("Forgot password?")}}</a> --!>
                        <button type="submit" class="text btn">{{__("Log In")}}</button>
                    </div>
                </form>
                <a href="{{ route('signup') }}" class="link text signin__btn signin__btn_member" id="member_login">{{__("Not a member yet?")}}</a>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</body>
</html>
