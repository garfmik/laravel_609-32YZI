<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Отзыв #{{ $review->id }}</title>
</head>
<body>
    <h2>Отзыв:</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Комментарий</td>
            <td>Рейтинг</td>
        </thead>
        <tr>
            <td>{{ $review->id }}</td>
            <td>{{ $review->comment }}</td>
            <td>{{ $review->rating }}</td>
        </tr>
    </table>
    <h2>Связанные данные:</h2>
    <table border="1">
        <thead>
            <td>Ресторан</td>
            <td>Автор</td>
        </thead>
        <tr>
            <td>{{ $review->restaurant->name }}</td>
            <td>{{ $review->user->name }}</td>
        </tr>
    </table>
</body>
</html>
