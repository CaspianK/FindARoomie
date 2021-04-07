<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create room</title>
</head>
<body>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('room.create') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Title" required>
        <select name="city">
            @foreach ($cities as $name => $id)
            <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="description" placeholder="Description" required>
        <button type="submit">Create a room</button>
    </form>
</body>
</html>