<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>{{ $profile->user->first_name }} {{ $profile->user->last_name }}</h1>
    <img src="{{ url('storage/profile/'.$profile->user->id.'/picture') }}" alt="{{ $profile->user->first_name.' '.$profile->user->last_name.'`s profile picture'}}" style="width: 300px;">
    <p>Phone Number: {{ $profile->phone_number }}</p>
    <p>Gender: {{ $profile->gender }}</p>
    <br>
    <p>Bio: {{ $profile->bio }}</p>
</body>
</html>