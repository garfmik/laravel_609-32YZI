@extends('layout')
@section('title','Отзыв')
@section('content')
    @if ($review)
        <h2>Отзыв #{{ $review->id }}</h2>

        <table class="table table-bordered">
            <tr><th>id</th><th>Комментарий</th><th>Рейтинг</th></tr>
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->comment }}</td>
                <td>{{ $review->rating }}</td>
            </tr>
        </table>

        <h4>Связанные данные</h4>
        <table class="table table-sm">
            <tr><th>Ресторан</th><th>Автор</th></tr>
            <tr><td>{{ optional($review->restaurant)->name }}</td><td>{{ optional($review->user)->name }}</td></tr>
        </table>
    @else
        <div class="alert alert-warning">Отзыв не найден.</div>
    @endif
@endsection
