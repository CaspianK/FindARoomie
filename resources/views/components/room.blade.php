@props(['room'])

<div class="room">
    <div class="room__image" style="background-image: url({{'/storage/room/'.$room->id.'/photo/1'}});"></div>
    <div class="room__text">
        <h3 class="text">{{ $room->title }}</h3>
        <p class="room__address text">{{ $room->address }}</p>
        <div class="room__last">
            <p class="text room__owner">{{ $room->profile->user->first_name.' '.$room->profile->user->last_name }}</p>
            <form action="">
                <button class="room__bookmark" type="submit"></button>
            </form>
        </div>
    </div>
</div>