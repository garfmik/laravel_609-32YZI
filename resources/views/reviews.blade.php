<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отзывы для {{ $restaurant->name }}</title>
</head>
<body>
<h2>Список отзывов для {{ $restaurant->name }}</h2>
<table border="1">
    <thead>
    <td>id</td>
    <td>Комментарий</td>
    <td>Рейтинг</td>
    <td>Действия</td>
    </thead>
    @foreach ($reviews as $review)
        <tr>
            <td>{{ $review->id }}</td>
            <td>{{ $review->comment }}</td>
            <td>{{ $review->rating }}</td>
            <td>
                <a href="{{ url('review/edit', $review->id) }}">Редактировать</a>
                <a href="{{ url('review/destroy', $review->id) }}">Удалить</a>
            </td>
        </tr>
    @endforeach
</table>
<a href="{{ url('restaurants/' . $restaurant->id . '/reviews/create') }}">Добавить отзыв</a>
</body>
</html>
