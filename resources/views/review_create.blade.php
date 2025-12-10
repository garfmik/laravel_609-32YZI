@extends('layout')
@section('title','Добавление отзыва')
@section('content')
    <h2>Добавление отзыва для {{ $restaurant->name }}</h2>

    <form method="post" action="{{ url('review') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Комментарий</label>
            <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" rows="4">{{ old('comment') }}</textarea>
            @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Рейтинг</label>
            <input type="number" name="rating" min="1" max="5" class="form-control @error('rating') is-invalid @enderror" value="{{ old('rating') }}">
            @error('rating')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
        <button class="btn btn-primary" type="submit">Добавить</button>
        <a class="btn btn-secondary" href="{{ url('restaurants/'.$restaurant->id.'/reviews') }}">Отмена</a>
    </form>
@endsection
