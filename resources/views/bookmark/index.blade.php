<!DOCTYPE html>
<html lang="en">
<x-head-meta title="Bookmakrs"></x-head-meta>
<body>
    <x-header></x-header>
    <div class="main main_bookmarks">
        <div class="container main__container">
            <h2 class="text">Your Bookmarks:</h2>
            <div class="rooms" id="rooms">
                @include('room.display')
            </div>
            <div class="loader hide text">
                <img src="{{ url('storage/images/loader.gif') }}" alt="">
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</body>
</html>