@extends('layout')
@section('title','Список ресторанов')
@section('content')
    <h2>Список ресторанов:</h2>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Наименование</th>
            <th>Город</th>
            <th>Адрес</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($restaurants as $restaurant)
            <tr>
                <td>
                    <a href="{{ url('restaurants/'.$restaurant->id) }}" class="restaurant-link">
                        {{ $restaurant->name }}
                    </a>
                </td>
                <td>{{ $restaurant->city }}</td>
                <td>{{ $restaurant->address }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $restaurants->links() }}
@endsection
