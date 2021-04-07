<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room</title>
</head>
<body>
    <h1>{{ $room->title }}</h1>
    <p><b>Address:</b> {{ $room->city->name }}, {{ $room->address }}</p>
    <br>
    <p>{{ $room->description }}</p>
    <br>
    <p>Posted on: {{ $room->created_at }}</p>
</body>
</html>