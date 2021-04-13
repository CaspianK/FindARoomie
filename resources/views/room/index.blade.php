<!DOCTYPE html>
<html lang="en">
<x-head-meta title="Home"></x-head-meta>
<body>
    <x-header></x-header>
    <div class="intro">
        <div class="container intro__container">
            <div class="intro__text text">
                <div class="intro__welcome">
                    <h1>Broke and lonely?</h1>
                    <p>FindARoomie! is what will help you. Post your 'room' so that you can find someone to share it with! Or if you don't have one yet - find it with us! It's easy, you'll like it!</p>
                </div>
                <div class="intro__buttons">
                    <a href="" class="link text">Find a room</a>
                    <a href="{{ route('room.create') }}" class="link text btn">Post a room</a>
                </div>
            </div>
            <div><img src="{{ url('storage/images/home.png') }}" alt="" class="intro__picture"></div>
        </div>
    </div>
    <div class="main main_home">
        <div class="container main__container">
            <h2 class="text">See available rooms in Astana</h2>
            <div class="rooms scrolling-pagination">
                @foreach($rooms as $room)
                    <x-room :room="$room"></x-room>
                @endforeach
                {{ $rooms->links() }}
            </div>
        </div>
    </div>
    <x-footer></x-footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
</body>
</html>