<!DOCTYPE html>
<html lang="en">
<x-head-meta title="Forgot Password"></x-head-meta>
<body>
    <x-header></x-header>
    <div class="main main_signin">
        <div class="container main_signin__container">
            <div class="main_signin__wrapper" id="forgot">
                <form action="{{ route('password.email') }}" class="signin" method="POST">
                    @csrf
                    <x-auth-session-status :status="session('status')" />
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <label for="email" class="text">Email</label>
                    <input type="email" id="email" name="email" class="text" required autofocus>
                    <div class="signin__last">
                        <a href="{{ route('signin') }}" class="link text signin__btn" id="goback">Go Back</a>
                        <button type="submit" class="text btn">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</body>
</html>