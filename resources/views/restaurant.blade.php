<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $restaurant->name }}</title>
</head>
<body>
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
    <h2>Отзывы:</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Комментарий</td>
            <td>Рейтинг</td>
            <td>Автор</td>
        </thead>
    @foreach ($restaurant->reviews as $review)
        <tr>
            <td>{{ $review->id }}</td>
            <td>{{ $review->comment }}</td>
            <td>{{ $review->rating }}</td>
            <td>{{ $review->user->name }}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>
