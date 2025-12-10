@extends('layout')
@section('title', $restaurant->name ?? 'Ресторан')
@section('content')
    @if ($restaurant)
        <h2>{{ $restaurant->name }}</h2>

        <table class="table table-sm table-bordered">
            <tr>
                <th>Наименование</th>
                <th>Город</th>
                <th>Адрес</th>
            </tr>
            <tr>
                <td>
                    <a href="{{ url('/restaurants/' . $restaurant->id) }}" class="restaurant-link">
                        {{ $restaurant->name }}
                    </a>
                </td>
                <td>{{ $restaurant->city }}</td>
                <td>{{ $restaurant->address }}</td>
            </tr>
        </table>

        @if(Auth::check())
            <div class="mb-3 d-flex gap-2">
                @if(Auth::user()->restaurants->contains($restaurant->id))
                    <a href="{{ url('/restaurants/'.$restaurant->id.'/unfavorite') }}" class="btn btn-warning">
                        Удалить из избранного
                    </a>
                @else
                    <a href="{{ url('/restaurants/'.$restaurant->id.'/favorite') }}" class="btn btn-success">
                        Добавить в избранное
                    </a>
                @endif

                <a class="btn btn-success" href="{{ url('restaurants/' . $restaurant->id . '/reviews/create') }}">
                    Добавить отзыв
                </a>
            </div>
        @endif

        <h3>Отзывы</h3>
        @if($restaurant->reviews->count() > 0)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Комментарий</th>
                    <th>Рейтинг</th>
                    <th>Автор</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($restaurant->reviews as $review)
                    <tr>
                        <td>{{ $review->comment }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ optional($review->user)->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">Отзывов пока нет.</div>
        @endif
    @else
        <div class="alert alert-warning">Ресторан не найден.</div>
    @endif
@endsection
