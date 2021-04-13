@props(['room'])

<div class="room">
    <div class="room__image" style="background-image: url({{'/storage/room/'.$room->id.'/photo/1'}});"></div>
    <div class="room__text">
        <h3><a class="text link" href="{{ route('room.show', ['id' => $room->id]) }}">{{ $room->title }}</a></h3>
        <p class="room__address text">{{ $room->address }}</p>
        <div class="room__last">
            <a href="{{ route('profile', ['id' => $room->profile->user->id]) }}" class="link text room_owner">{{ $room->profile->user->first_name.' '.$room->profile->user->last_name }}</a>
            @auth 
                @if (auth()->user()->id == $room->profile->user->id)
                @else
                    <form action="">
                        <button class="room__bookmark" type="submit"></button>
                    </form>
                @endif
            @else 
                <form action="">
                    <button class="room__bookmark" type="submit"></button>
                </form>
            @endauth
        </div>
    </div>
</div>