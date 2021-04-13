<!DOCTYPE html>
<html lang="en">
<x-head-meta title="Create room"></x-head-meta>
<body>
    <x-header></x-header>
    <div class="main main_signin">
        <div class="container main_signin__container">
            <div class="main_signin__wrapper">
                <form action="{{ route('room.store') }}" class="signin" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-auth-validation-errors :errors="$errors" />
                    <div class="signin__together">
                        <div>
                            <label class="text">Room Pictures</label>
                            <div class="signin__ppicture-wrapper">
                                <label for="room_pictures" class="text btn">Choose File</label>
                                <input type="file" id="room_pictures" name="room_pictures[]" multiple>
                                <div class="file-name text">No file chosen</div>
                            </div>
                        </div>
                        <div class="signin__gender-wrapper">
                            <label for="city" class="text">City</label>
                            <select name="city" id="city">
                                @foreach ($cities as $name => $id)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label for="title" class="text">Title</label>
                    <input type="tel" id="title" name="title" class="text" id="phone" required>
                    <label for="address" class="text">Address</label>
                    <input type="text" id="address" name="address" class="text" required>
                    <label for="description" class="text">Description</label>
                    <textarea name="description" id="description" placeholder="Minimum 50 symbols" class="text" minlength="50"></textarea>
                    <div class="signin__last">
                        <button type="submit" class="text btn">Create Room</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
    <script>
        const file = document.querySelector('#room_pictures');
        file.addEventListener('change', (e) => {
            document.querySelector('.file-name').textContent = 'File chosen';
        });
    </script>
</body>
</html>