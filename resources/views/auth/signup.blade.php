<!DOCTYPE html>
<html lang="en">
<x-head-meta :title="__('Sign Up')"></x-head-meta>
<body>
    <x-header></x-header>
    <div class="main main_signin">
        <div class="container main_signin__container">
            <div class="main_signin__wrapper" id="signup">
                <form action="{{ route('signup') }}" class="signin" method="POST">
                    @csrf
                    <x-auth-validation-errors :errors="$errors" />
                    <label for="first_name" class="text">{{__("First Name")}}</label>
                    <input type="text" id="first_name" name="first_name" class="text" required autofocus>
                    <label for="last_name" class="text">{{__("Last Name")}}</label>
                    <input type="text" id="last_name" name="last_name" class="text" required>
                    <label for="email" class="text">{{__("Email")}}</label>
                    <input type="email" id="email" name="email" class="text" required>
                    <label for="password" class="text">{{__("Password")}}</label>
                    <input type="password" id="password" name="password" class="text" required autocomplete="new-password">
                    <label for="password_confirmation" class="text">{{__("Confirm Password")}}</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="text" required>
                    <div class="signin__last">
                        <button type="submit" class="text btn">{{__("Sign Up")}}</button>
                    </div>
                </form>
                <a href="{{ route('signin') }}" class="link text signin__btn signin__btn_member" id="member_signup">{{__("Already a member?")}}</a>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</body>
</html>