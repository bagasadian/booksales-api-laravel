<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Authors</title>
</head>
<body>
    <h1>Daftar Penulis</h1>
    <p>Selamat datang di Book Authors!</p>
        @foreach($authors as $author)
        <ul>
            <li>{{ $author['name'] }}</li>
            <li>{{ $author['bio'] }}</li>
        </ul>
        @endforeach
</body>
</html>