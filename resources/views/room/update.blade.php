<!DOCTYPE html>
<html lang="en">
<x-head-meta :title="__('Update Room')"></x-head-meta>

<body>
    <x-header></x-header>
    <div class="main main_signin">
        <div class="container main_signin__container">
            <div class="main_signin__wrapper">
                <form action="{{ route('room.update', ['id' => $room->id ]) }}" class="signin" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-auth-validation-errors :errors="$errors" />
                    <div class="signin__together">
                        <div>
                            <label class="text">{{__("Room Pictures")}}</label>
                            <div class="signin__ppicture-wrapper">
                                <label for="room_pictures" class="text btn">{{__("Choose File")}}</label>
                                <input type="file" id="room_pictures" name="room_pictures[]" multiple>
                                <div class="file-name text" id="not_chosen">{{__("No file chosen")}}</div>
                                <div class="file-name text hide" id="chosen">{{__("File chosen")}}</div>
                            </div>
                        </div>
                        <div class="signin__gender-wrapper">
                            <label for="city" class="text">{{__("City")}}</label>
                            <select name="city" id="city" required>
                                <option value="{{ $room->city->id }}" selected hidden>{{ $room->city->name }}</option>
                                @foreach ($cities as $name => $id)
                                <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label for="title" class="text">{{__("Title")}}</label>
                    <input type="tel" id="title" name="title" class="text" id="phone" required value="{{ $room->title }}">
                    <label for="address" class="text">{{__("Address")}}</label>
                    <input type="text" id="address" name="address" class="text" required value="{{ $room->address }}">
                    <label for="description" class="text">{{__("Description")}}</label>
                    <textarea name="description" id="description" placeholder="{{__('Minimum 50 symbols')}}" class="text" minlength="50">{{ $room->description }}</textarea>
                    <div class="signin__last">
                        <button type="submit" class="text btn">{{__("Update Room")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
    <script>
        const file = document.querySelector('#room_pictures');
        const not_chosen = document.getElementById('not_chosen');
        const chosen = document.getElementById('chosen');
        file.addEventListener('change', (e) => {
            not_chosen.classList.add('hide');
            chosen.classList.remove('hide');
        });
    </script>
</body>

</html>