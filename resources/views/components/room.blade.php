@props(['room'])

@php
use App\Models\Bookmark;
if (Auth::check()) {
$user_id = auth()->user()->id;
$bookmark = Bookmark::where('user_id', $user_id)->where('room_id', $room->id)->exists();
}
@endphp

<div class="room">
    <div class="room__image" style="background-image: url({{'https://d1avzxl1k4m0v2.cloudfront.net/room/'.$room->id.'/photo/1'}});"></div>
    <div class="room__text">
        <h3><a class="text link" href="{{ route('room.show', ['id' => $room->id]) }}">{{ $room->title }}</a></h3>
        <p class="room__address text">{{ $room->address }}</p>
        <div class="room__last">
            <a href="{{ route('profile', ['id' => $room->profile->user->id]) }}" class="link text room_owner">{{ $room->profile->user->first_name.' '.$room->profile->user->last_name }}</a>
            @auth
            @if ($user_id == $room->profile->user->id)
            @else
            @if ($bookmark == 0)
            <form action="{{ route('bookmark.store', ['room_id' => $room->id]) }}">
                <button class="room__bookmark" type="submit"></button>
            </form>
            @else
            <form action="{{ route('bookmark.destroy', ['room_id' => $room->id]) }}">
                <button class="room__bookmark room__bookmark_checked" type="submit"></button>
            </form>
            @endif
            @endif
            @else
            <form action="{{ route('bookmark.store', ['room_id' => $room->id]) }}">
                <button class="room__bookmark" type="submit"></button>
            </form>
            @endauth
        </div>
    </div>
</div>