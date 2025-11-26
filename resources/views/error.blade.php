<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ошибка доступа</title>
</head>
<body>
    <h2>{{ $message }}</h2>
    <a href="{{ url('/restaurants/' . $restaurant_id . '/reviews') }}">Назад</a>
</body>
</html>
