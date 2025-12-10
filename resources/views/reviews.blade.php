@extends('layout')
@section('title','Отзывы')
@section('content')
    <h2>Отзывы для {{ $restaurant->name }}</h2>

    <table class="table table-bordered">
        <thead><tr><th>id</th><th>Комментарий</th><th>Рейтинг</th><th>Действия</th></tr></thead>
        <tbody>
        @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->comment }}</td>
                <td>{{ $review->rating }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ url('review/edit', $review->id) }}">Редактировать</a>

                    <form style="display:inline-block" method="post" action="{{ url('review/destroy', $review->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить отзыв?')">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a class="btn btn-success" href="{{ url('restaurants/' . $restaurant->id . '/reviews/create') }}">Добавить отзыв</a>
@endsection
