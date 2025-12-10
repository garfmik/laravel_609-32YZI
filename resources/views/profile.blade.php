@extends('layout')
@section('title', 'Профиль')

@section('content')
    <div class="profile-info">
        <h2>{{ $user->name }}</h2>
        <p>Email: {{ $user->email }}</p>
    </div>

    <hr>
    <h4>Мои отзывы</h4>
    @if($reviews->count())
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Ресторан</th>
                <th>Комментарий</th>
                <th>Рейтинг</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>
                        <a href="{{ url('restaurants/'.$review->restaurant->id) }}" class="restaurant-link">
                            {{ $review->restaurant->name }}
                        </a>
                    </td>
                    <td>{{ $review->comment }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ url('review/edit', $review->id) }}">Редактировать</a>

                        <form action="{{ url('review/destroy', $review->id) }}" method="post" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Удалить отзыв?')">Удалить</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">Вы ещё не оставили отзывов.</div>
    @endif

    <hr>
    <h4>Мои избранные рестораны</h4>
    @if($favorites->count())
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Название</th>
                <th>Город</th>
                <th>Адрес</th>
                <th>Действия</th> {{-- новая колонка для кнопки --}}
            </tr>
            </thead>
            <tbody>
            @foreach($favorites as $restaurant)
                <tr>
                    <td>
                        <a href="{{ url('restaurants/'.$restaurant->id) }}" class="restaurant-link">
                            {{ $restaurant->name }}
                        </a>
                    </td>
                    <td>{{ $restaurant->city }}</td>
                    <td>{{ $restaurant->address }}</td>
                    <td>
                        <form action="{{ url('favorites/destroy', $restaurant->id) }}" method="post" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Удалить ресторан из избранного?')">
                                Удалить из избранного
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">Вы ещё не добавили рестораны в избранное.</div>
    @endif
@endsection
