@extends('layout')
@section('title','Пользователь')
@section('content')
    @if ($user)
        <h2>Пользователь:</h2>
        <table class="table table-bordered">
            <thead><tr><th>id</th><th>Имя</th></tr></thead>
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
            </tr>
        </table>
        <h2>Избранные рестораны:</h2>
        <table class="table table-sm table-striped">
            <thead><tr><th>id</th><th>Наименование</th><th>Город</th></tr></thead>
            @foreach ($user->restaurants as $restaurant)
                <tr>
                    <td>{{ $restaurant->id }}</td>
                    <td>{{ $restaurant->name }}</td>
                    <td>{{ $restaurant->city }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>Пользователь не найден.</p>
    @endif
@endsection
