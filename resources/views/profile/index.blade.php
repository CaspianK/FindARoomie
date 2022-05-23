<!DOCTYPE html>
<html lang="en">
<x-head-meta :title="$profile->user->first_name.' '.$profile->user->last_name.'`s Profile'"></x-head-meta>

<body>
    <x-header></x-header>
    <div class="main">
        <div class="container profile__container">
            <div class="profile__header">
                <div class="profile__picture" style="background-image: url({{'https://d1avzxl1k4m0v2.cloudfront.net/profile/'.$profile->user->id.'/picture'}});"></div>
                <div class="profile__info">
                    <div class="profile__together">
                        <h1 class="text">{{ $profile->user->first_name }} {{ $profile->user->last_name }}</h1>
                        @if (auth()->user()->id == $profile->user->id)
                        <a href="{{ route('profile.update', ['id' => $profile->user->id]) }}" class="link text btn btn_change">{{__("Update Profile")}}</a>
                        @endif
                    </div>
                    <div class="profile__together">
                        <a href="tel:{{ $profile->phone_number }}" class="text link profile__link">{{ $profile->phone_number }}</a>
                        <span class="text">{{ $profile->gender }}</span>
                    </div>
                    <div class="profile__bio text profile__bio_hide" id="bio">{{ $profile->bio }}</div>
                    <button class="profile__more link text" id="readmore">{{__("Read more")}}</button>
                    <button class="profile__more link text hide" id="hide">{{__("Hide")}}</button>
                    <div class="profile__together">
                        @if ($profile->instagram)
                        <a href="{{ 'https://www.instagram.com/'.$profile->instagram }}" target="_blank" class="link text profile__link">Instagram</a>
                        @endif
                        @if ($profile->spotify)
                        <a href="{{ 'https://open.spotify.com/'.$profile->spotify }}" target="_blank" class="link text profile__link">Spotify</a>
                        @endif
                    </div>
                </div>
            </div>
            @if ($room)
            <div class="profile__room">
                @if (auth()->user()->id == $profile->user->id)
                <h2 class="text">{{__("Your room:")}}</h2>
                @else
                <h2 class="text">{{__("Their room:")}}</h2>
                @endif
                <x-room :room="$room"></x-room>
            </div>
            @else
            <div class="profile__promo">
                @if (auth()->user()->id == $profile->user->id)
                <h2 class="text">{{__("Looking for a mate?")}}</h2>
                <div class="intro__buttons">
                    <a href="{{ url('/#find') }}" class="link text">{{__("Find a room")}}</a>
                    <a href="{{ route('room.create') }}" class="link text btn">{{__("Post a room")}}</a>
                </div>
                @else
                <h2 class="text profile__doesnt">{{__("This person doesn't have a room")}}</h2>
                @endif
            </div>
            @endif
        </div>
    </div>
    <x-footer></x-footer>
    <script>
        let readmore = document.getElementById('readmore');
        let hide = document.getElementById('hide');
        let bio = document.getElementById('bio');
        if (bio.innerText.length < 60) readmore.classList.add('hide');
        readmore.addEventListener('click', function() {
            readmore.classList.add('hide');
            hide.classList.remove('hide');
            bio.classList.remove('profile__bio_hide');
        });
        hide.addEventListener('click', function() {
            hide.classList.add('hide');
            readmore.classList.remove('hide');
            bio.classList.add('profile__bio_hide');
        });
    </script>
</body>

</html>