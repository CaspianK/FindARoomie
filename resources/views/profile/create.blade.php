<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create profile</title>
</head>
<body>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('profile.create') }}" enctype="multipart/form-data">
        @csrf
        <label for="profile_picture">Profile Picture</label>
        <input type="file" name="profile_picture">
        <input type="text" name="phone_number" placeholder="Phone Number" required>
        <input type="date" name="birthdate" placeholder="Birthdate" required>
        <input type="text" name="gender" placeholder="Gender" required>
        <input type="text" name="bio" placeholder="Bio" required>
        <input type="text" name="instagram" placeholder="Instagram [optional]">
        <input type="text" name="spotify" placeholder="Spotify [optional]">
        <button type="submit">Create a profile</button>
    </form>
</body>
</html>