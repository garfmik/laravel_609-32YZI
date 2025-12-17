@extends('layout')
@section('title', $restaurant->name ?? 'Ресторан')
@section('content')

    @if($restaurant)
        <div class="row mb-4">
            <div class="col-md-6">
                <img src="{{ $restaurant->img ? asset($restaurant->img) : asset('images/restaurants/default-restaurant.jpg') }}"
                     class="img-fluid rounded shadow-sm" alt="{{ $restaurant->name }}">
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center">
                <h1 class="mb-2">{{ $restaurant->name }}</h1>
                <p class="mb-1"><strong>Город:</strong> {{ $restaurant->city }}</p>
                <p class="mb-1"><strong>Адрес:</strong> {{ $restaurant->address }}</p>
                <p class="mb-1"><strong>Кухня:</strong> {{ $restaurant->cuisine ?? 'не указано' }}</p>
                <p class="mb-1"><strong>Средний чек:</strong> {{ number_format($restaurant->avg_price, 0, '', ' ') }} ₽</p>
                <p class="mb-1"><strong>Рейтинг:</strong> {{ number_format($restaurant->rating,1) }} ⭐</p>
                <p><strong>Телефон:</strong> {{ $restaurant->phone ?? 'не указан' }}</p>
                <p><strong>Часы работы:</strong> {{ $restaurant->work_hours ?? 'не указано' }}</p>


            @if(Auth::check())
                    <div class="mt-3">
                        @if(Auth::user()->restaurants->contains($restaurant->id))
                            <form action="{{ url('/restaurants/'.$restaurant->id.'/unfavorite') }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning me-2">
                                    <i class="fa-solid fa-heart"></i> Удалить из избранного
                                </button>
                            </form>

                        @else
                            <form action="{{ url('/restaurants/'.$restaurant->id.'/favorite') }}" method="POST" style="display:inline-block">
                                @csrf
                                <button type="submit" class="btn btn-success me-2">
                                    <i class="fa-solid fa-heart"></i> Добавить в избранное
                                </button>
                            </form>
                        @endif

                            <a href="{{ url('restaurants/' . $restaurant->id . '/reviews/create') }}" class="btn btn-add-review">
                                <i class="fa-solid fa-plus"></i> Добавить отзыв
                            </a>


                    </div>
                @endif
            </div>
        </div>

        <h3 class="mb-3">Отзывы</h3>
        @if($restaurant->reviews->count() > 0)
            <div class="table-responsive mb-4">
                <table class="table table-striped table-bordered">
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
                            <td>{{ $review->rating }} ⭐</td>
                            <td>{{ optional($review->user)->name ?? 'Гость' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info mb-4">Отзывов пока нет.</div>
        @endif

        <div class="mt-4">
            <a href="{{ url('/restaurants') }}" class="btn btn-secondary">&larr; Вернуться </a>
        </div>

    @else
        <div class="alert alert-warning">Ресторан не найден.</div>
    @endif

@endsection
