<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Список ресторанов</title>
</head>
<body>
    <h2>Список ресторанов:</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Наименование</td>
            <td>Город</td>
        </thead>
    @foreach ($restaurants as $restaurant)
        <tr>
            <td>{{ $restaurant->id }}</td>
            <td>{{ $restaurant->name }}</td>
            <td>{{ $restaurant->city }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
