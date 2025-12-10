@extends('layout')
@section('title', $restaurant->name ?? 'Ресторан')
@section('content')
    @if ($restaurant)
        <h2>Ресторан</h2>
        <table class="table table-bordered">
            <tr><th>id</th><th>Наименование</th><th>Город</th></tr>
            <tr>
                <td>{{ $restaurant->id }}</td>
                <td>{{ $restaurant->name }}</td>
                <td>{{ $restaurant->city }}</td>
            </tr>
        </table>

        <h3>Пользователи, добавившие в избранное</h3>
        <table class="table table-sm table-striped">
            <thead><tr><th>id</th><th>Имя</th></tr></thead>
            <tbody>
            @foreach ($restaurant->users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">Ресторан не найден.</div>
    @endif
@endsection
