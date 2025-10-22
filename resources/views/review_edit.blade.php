<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактирование отзыва #{{ $review->id }}</title>
    <style>
        .is-invalid { color: red; }
        .form-table { width: 100%; max-width: 600px; border-collapse: collapse; }
        .form-table td { padding: 10px; vertical-align: top; }
        .form-table label { display: block; margin-bottom: 5px; }
        textarea, select, input[type="number"] { width: 100%; box-sizing: border-box; }
    </style>
</head>
<body>
<h2>Редактирование отзыва</h2>
<form method="post" action="{{ url('review/update', $review->id) }}">
    @csrf
    <table class="form-table">
        <tr>
            <td><label>Комментарий</label></td>
            <td>
                <textarea name="comment" rows="4">@if(old('comment')) {{ old('comment') }} @else {{ $review->comment }} @endif</textarea>
                @error('comment')
                <div class="is-invalid">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td><label>Рейтинг</label></td>
            <td>
                <input type="number" name="rating" value="@if(old('rating')) {{ old('rating') }} @else {{ $review->rating }} @endif" min="1" max="5">
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
                        <option value="{{ $restaurant->id }}"
                                @if(old('restaurant_id'))
                                    @if(old('restaurant_id') == $restaurant->id) selected @endif
                                @else
                                    @if($review->restaurant_id == $restaurant->id) selected @endif
                            @endif>{{ $restaurant->name }}
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
                        <option value="{{ $user->id }}"
                                @if(old('user_id'))
                                    @if(old('user_id') == $user->id) selected @endif
                                @else
                                    @if($review->user_id == $user->id) selected @endif
                            @endif>{{ $user->name }}
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
