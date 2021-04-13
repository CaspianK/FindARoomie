<!DOCTYPE html>
<html lang="en">
<x-head-meta :title="$profile->user->first_name.' '.$profile->user->last_name.'`s Profile'"></x-head-meta>
<body>
    <x-header></x-header>
    <div class="main">
        <div class="container profile__container">
            <div class="profile__header">
                <div class="profile__picture" style="background-image: url({{'/storage/profile/'.$profile->user->id.'/picture'}});"></div>
                <div class="profile__info">
                    <div class="profile__together">
                        <h1 class="text">{{ $profile->user->first_name }} {{ $profile->user->last_name }}</h1>
                        @if (auth()->user()->id == $profile->user->id)
                            <a href="#" class="link text btn btn_change">Change Profile</a>
                        @endif
                    </div>
                    <div class="profile__together">
                        <a href="tel:{{ $profile->phone_number }}" class="text link profile__link">{{ $profile->phone_number }}</a>
                        <span class="text">{{ $profile->gender }}</span>
                    </div>
                    <div class="profile__bio text profile__bio_hide" id="bio">{{ $profile->bio }}</div>
                    <button class="profile__more link text" id="readmore" value="HIDDEN">Read more</button>
                    <div class="profile__together">
                        @if ($profile->instagram)
                            <a href="{{ 'https://www.instagram.com/'.$profile->instagram }}" class="link text profile__link">Instagram</a>
                        @endif
                        @if ($profile->spotify)
                            <a href="#" class="link text profile__link">Spotify</a>
                        @endif
                    </div>
                </div>
            </div>
            @if ($room)
            <div class="profile__room">
                @if (auth()->user()->id == $profile->user->id)
                    <h2 class="text">Your room:</h2>
                @else 
                    <h2 class="text">Their room:</h2>
                @endif
                <x-room :room="$room"></x-room>
            </div>
            @else
            <div class="profile__promo">
                @if (auth()->user()->id == $profile->user->id)
                    <h2 class="text">Looking for a mate?</h2>
                    <div class="intro__buttons">
                        <a href="" class="link text">Find a room</a>
                        <a href="" class="link text btn">Post a room</a>
                    </div>
                @else
                    <h2 class="text profile__doesnt">This person doesn't have a room</h2>
                @endif
            </div>
            @endif
        </div>
    </div>
    <x-footer></x-footer>
    <script>
        let readmore = document.getElementById('readmore');
        let bio = document.getElementById('bio');
        if (bio.innerText.length < 45) readmore.classList.add('hide');
        readmore.addEventListener('click', function() {
            if(readmore.value == "HIDDEN") {
                readmore.value = "SHOWN";
                readmore.textContent = "Hide";
                bio.classList.remove('profile__bio_hide');
            }
            else {
                readmore.value = "HIDDEN";
                readmore.textContent = "Read more";
                bio.classList.add('profile__bio_hide');
            }
        });
    </script>
</body>
</html>