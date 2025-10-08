<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Пользователь #{{ $user->id ?? 'Не найден' }}</title>
</head>
<body>
    @if ($user)
        <h2>Пользователь:</h2>
        <table border="1">
            <thead>
                <td>id</td>
                <td>Имя</td>
            </thead>
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
            </tr>
        </table>
        <h2>Избранные рестораны:</h2>
        <table border="1">
            <thead>
                <td>id</td>
                <td>Наименование</td>
                <td>Город</td>
            </thead>
            @foreach ($user->restaurants as $restaurant)
                <tr>
                    <td>{{ $restaurant->id }}</td>
                    <td>{{ $restaurant->name }}</td>
                    <td>{{ $restaurant->city }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>Пользователь не найден.</p>
    @endif
</body>
</html>
