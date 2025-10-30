<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление отзыва</title>
    <style>
        .is-invalid { color: red; }
        .form-table { width: 100%; max-width: 600px; border-collapse: collapse; }
        .form-table td { padding: 10px; vertical-align: top; }
        .form-table label { display: block; margin-bottom: 5px; }
        textarea, select, input[type="number"] { width: 100%; box-sizing: border-box; }
    </style>
</head>
<body>
<h2>Добавление отзыва</h2>
<form method="post" action="{{ url('review') }}">
    @csrf
    <table class="form-table">
        <tr>
            <td><label>Комментарий</label></td>
            <td>
                <textarea name="comment" rows="4">{{ old('comment') }}</textarea>
                @error('comment')
                <div class="is-invalid">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td><label>Рейтинг</label></td>
            <td>
                <input type="number" name="rating" value="{{ old('rating') }}" min="1" max="5">
                @error('rating')
                <div class="is-invalid">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
        <tr>
            <td><label>Ресторан</label></td>
            <td>
                <div>{{ $restaurant->name }}</div>
                <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
            </td>
        </tr>
        </tr>
    </table>
    <br>
    <input type="submit" style="margin-top: 10px;">
</form>
</body>
</html>
