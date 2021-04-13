<!DOCTYPE html>
<html lang="en">
<x-head-meta title="Create Profile">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
</x-head-meta>
<body>
    <x-header></x-header>
    <div class="main main_signin">
        <div class="container main_signin__container">
            <div class="main_signin__wrapper">
                <form action="{{ route('profile.store') }}" class="signin" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-auth-validation-errors :errors="$errors" />
                    <div class="signin__together">
                        <div>
                            <label class="text">Profile Picture</label>
                            <div class="signin__ppicture-wrapper">
                                <label for="profile_picture" class="text btn">Choose File</label>
                                <input type="file" id="profile_picture" name="profile_picture">
                                <div class="file-name text">No file chosen</div>
                            </div>
                        </div>
                        <div class="signin__gender-wrapper">
                            <label for="gender" class="text">Gender</label>
                            <select name="gender" id="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="signin__together">
                        <div>
                            <label for="phone_number" class="text">Phone Number</label>
                            <input type="tel" id="phone_number" name="phone_number" class="text" id="phone" placeholder="+7 (707) 707-7070" required>
                        </div>
                        <div class="signin__birthdate-wrapper">
                            <label for="birthdate" class="text">Birthdate</label>
                            <input type="date" id="birthdate" name="birthdate" class="text" id="birthdate" placeholder="DD-MM-YYYY" required>
                        </div>
                    </div>
                    <label for="bio" class="text">Bio</label>
                    <textarea name="bio" id="bio" placeholder="Minimum 50 symbols" class="text" minlength="50"></textarea>
                    <div class="signin__together">
                        <div>
                            <label for="instagram" class="text">Instagram&nbsp;&nbsp;&nbsp;<span class="signin__optional">*Optional</span></label>
                            <input type="text" id="instagram" name="instagram" class="text" placeholder="@">
                        </div>
                        <div>
                            <label for="spotify" class="text">Spotify&nbsp;&nbsp;&nbsp;<span class="signin__optional">*Optional</span></label>
                            <input type="text" id="spotify" name="spotify" class="text" placeholder="@">
                        </div>
                    </div>
                    <div class="signin__last">
                        <button type="submit" class="text btn">Create Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
    <script>
        $(window).load(function() {
            var phone = [{ "mask": "+# (###) ###-####"}];
            $('#phone_number').inputmask({ 
                mask: phone, 
                greedy: false, 
                definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
        });
        const file = document.querySelector('#profile_picture');
        file.addEventListener('change', (e) => {
            document.querySelector('.file-name').textContent = 'File chosen';
        });
    </script>
</body>
</html>