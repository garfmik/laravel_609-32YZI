<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $restaurant->name ?? 'Ресторан не найден' }}</title>
</head>
<body>
    @if ($restaurant)
        <h2>Ресторан:</h2>
        <table border="1">
            <thead>
                <td>id</td>
                <td>Наименование</td>
                <td>Город</td>
            </thead>
            <tr>
                <td>{{ $restaurant->id }}</td>
                <td>{{ $restaurant->name }}</td>
                <td>{{ $restaurant->city }}</td>
            </tr>
        </table>
        <h2>Пользователи, добавившие в избранное:</h2>
        <table border="1">
            <thead>
                <td>id</td>
                <td>Имя</td>
            </thead>
            @foreach ($restaurant->users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
            </tr>
            @endforeach
        </table>
    @else
        <p>Ресторан не найден.</p>
   @endif
</body>
</html>
