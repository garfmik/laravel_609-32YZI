@extends('layout')
@section('title','Редактирование отзыва')
@section('content')
    <h2>Редактирование отзыва #{{ $review->id }}</h2>

    <form method="post" action="{{ url('review/update', $review->id) }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Комментарий</label>
            <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" rows="4">{{ old('comment', $review->comment) }}</textarea>
            @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Рейтинг</label>
            <input type="number" name="rating" min="1" max="5" class="form-control @error('rating') is-invalid @enderror" value="{{ old('rating', $review->rating) }}">
            @error('rating')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <input type="hidden" name="restaurant_id" value="{{ $review->restaurant_id }}">
        <button class="btn btn-primary" type="submit">Сохранить</button>
        <a class="btn btn-secondary" href="{{ url('restaurants/'.$review->restaurant_id.'/reviews') }}">Отмена</a>
    </form>
@endsection
