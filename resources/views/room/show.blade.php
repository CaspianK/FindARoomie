<!DOCTYPE html>
<html lang="en">
<x-head-meta :title="$room->profile->user->first_name.' '.$room->profile->user->last_name.'`s room'">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
</x-head-meta>
<body>
    <x-header></x-header>
    <div class="main">
        <div class="container room_show__container">
            <div class="room_show__room">
                <div class="room_show__together">
                    <h1 class="text">{{ $room->title }}</h1>
                    @auth
                        @if (auth()->user()->id == $room->profile->user->id)
                            <a href="#" class="link text btn btn_change">Change Room</a>
                        @else
                            <a href="#" class="link text btn btn_change">Bookmark</a>
                        @endif
                    @else
                        <a href="#" class="link text btn btn_change">Bookmark</a>
                    @endauth
                </div>
                <div class="room_show__sp">
                    <div class="room_show__slider">
                        <div class="fotorama" data-allowfullscreen="true" data-trackpad="true" data-autoplay="true" data-loop="true" data-nav="none" data-width="960" data-height="500" data-fit="contain" data-arrows="true" data-click="true" data-swipe="false">
                            @foreach ($photos as $key => $photo)
                                <img src="{{ url('/storage/room/'.$room->id.'/photo/'.($key+1) ) }}" alt="">
                            @endforeach
                        </div>
                    </div>
                    <div class="room_show__profile">
                        <div class="profile__picture" style="background-image: url({{'/storage/profile/'.$room->profile->user->id.'/picture'}});"></div>
                        <h2 class="text room_show__name"><a href="{{ route('profile', ['id' => $room->profile->user->id]) }}" class="link text">{{ $room->profile->user->first_name }} {{ $room->profile->user->last_name }}</a></h2>
                        <a href="tel:{{ $room->profile->phone_number }}" class="text link profile__link">{{ $room->profile->phone_number }}</a>
                    </div>
                </div>
                <p class="text room_show__address">{{ $room->address }}</p>
                <p class="text room_show__description">{{ $room->description }}</p>
            </div>
        </div>
    </div>

    @if ( $bookmark == 0 )
    <a href="{{ url('/bookmark/create/'.$room->id ) }}">Bookmark it</a>
    @else
    <p>Already bookmarked!</p>
    @endif
    <x-footer></x-footer>
</body>
</html>