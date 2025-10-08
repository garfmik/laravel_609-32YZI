<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Список отзывов</title>
</head>
<body>
    <h2>Список отзывов:</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Комментарий</td>
            <td>Рейтинг</td>
        </thead>
    @foreach ($reviews as $review)
        <tr>
            <td>{{ $review->id }}</td>
            <td>{{ $review->comment }}</td>
            <td>{{ $review->rating }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
