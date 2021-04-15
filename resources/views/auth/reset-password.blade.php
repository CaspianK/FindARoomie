<!DOCTYPE html>
<html lang="en">
<x-head-meta :title="__('Forgot Password')"></x-head-meta>
<body>
    <x-header></x-header>
    <div class="main main_signin">
        <div class="container main_signin__container">
            <div class="main_signin__wrapper" id="forgot">
                <form action="{{ route('password.update') }}" class="signin" method="POST">
                    @csrf
                    <x-auth-session-status :status="session('status')" />
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <label for="email" class="text">{{__("Email")}}</label>
                    <input type="email" id="email" name="email" class="text" value="{{ $request->email }}" required>
                    <label for="password" class="text">{{__("Password")}}</label>
                    <input type="password" id="password" name="password" class="text" required autofocus>
                    <label for="password_confirmation" class="text">{{__("Confirm Password")}}</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="text" required>
                    <div class="signin__last">
                        <button type="submit" class="text btn">{{__("Reset Password")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</body>
</html>
