@extends('layout')
@section('title','Список ресторанов')
@section('content')
    <h2>Каталог ресторанов:</h2>

    <form method="GET" action="{{ url('/restaurants') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control form-control-lg"
                   placeholder="Введите название ресторана..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Поиск</button>
        </div>
    </form>


    <form method="GET" action="{{ url('/restaurants') }}" class="row g-3 mb-4 form-filter">

        <div class="col-md-3">
            <label class="form-label">Город</label>
            <select name="city" class="form-select">
                <option value="">Все</option>
                @foreach($cities as $city)
                    <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>{{ $city }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Кухня</label>
            <select name="cuisine" class="form-select">
                <option value="">Все</option>
                @foreach($cuisines as $cuisine)
                    <option value="{{ $cuisine }}" {{ request('cuisine') == $cuisine ? 'selected' : '' }}>{{ $cuisine }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Рейтинг от</label>
            <select name="rating" class="form-select">
                <option value="">Любой</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>{{ $i }} ⭐ и выше</option>
                @endfor
            </select>
        </div>

        <div class="col-md-3 d-flex align-items-end">
            <button class="btn btn-primary btn-add-review w-100">Фильтровать</button>
        </div>
        <div class="col-12">
            <a href="{{ url('/restaurants') }}" class="btn btn-secondary btn-sm">Сбросить фильтры</a>
        </div>

    </form>



    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($restaurants as $restaurant)
            <div class="col">
                <div class="card h-100">
                    {{-- Используем путь к файлу или дефолтное изображение --}}
                    <img src="{{ $restaurant->img ? asset($restaurant->img) : asset('images/restaurants/default-restaurant.jpg') }}"
                         class="card-img-top" alt="{{ $restaurant->name }}">

                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('restaurants/'.$restaurant->id) }}" class="text-decoration-none">
                                {{ $restaurant->name }}
                            </a>
                        </h5>

                        <p class="card-text">
                            <strong>Город:</strong> {{ $restaurant->city }}<br>
                            <strong>Кухня:</strong> {{ $restaurant->cuisine ?? 'не указано' }}<br>
                            <strong>Средний чек:</strong> {{ number_format($restaurant->avg_price, 0, '', ' ') }} ₽<br>
                            <strong>Рейтинг:</strong> {{ number_format($restaurant->rating,1) }} ⭐
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-3">
        {{ $restaurants->links() }}
    </div>
@endsection
