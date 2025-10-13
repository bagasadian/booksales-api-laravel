<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Authors</title>
</head>
<body>
    <h1>Daftar Penulis</h1>
        <table border = "1" cellpadding="8">
            <tr>
                <th>ID</th>
                <th>Nama Penulis</th>
                <th>Biografi</th>
            </tr>
        @foreach($authors as $author)
            <tr>
                <td>{{ $author['id'] }}</td>
                <td>{{ $author['name'] }}</td>
                <td>{{ $author['bio'] }}</td>
            </tr>
        @endforeach
        </table>
</body>
</html>