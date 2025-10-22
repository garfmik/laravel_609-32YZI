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
            <td><label>Ресторан</label></td>
            <td>
                <select name="restaurant_id">
                    <option value="" style="display:none"></option>
                    @foreach ($restaurants as $restaurant)
                        <option value="{{ $restaurant->id }}" @if(old('restaurant_id') == $restaurant->id) selected @endif>
                            {{ $restaurant->name }}
                        </option>
                    @endforeach
                </select>
                @error('restaurant_id')
                <div class="is-invalid">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td><label>Автор</label></td>
            <td>
                <select name="user_id">
                    <option value="" style="display:none"></option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if(old('user_id') == $user->id) selected @endif>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                <div class="is-invalid">{{ $message }}</div>
                @enderror
            </td>
        </tr>
    </table>
    <br>
    <input type="submit" style="margin-top: 10px;">
</form>
</body>
</html>
