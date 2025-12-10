@extends('layout')
@section('title','Ошибка доступа')
@section('content')
    <div class="alert alert-warning">
        <h4>Ошибка</h4>
        <p>{{ $message }}</p>
        <a class="btn btn-secondary" href="{{ url('/restaurants/' . $restaurant_id . '/reviews') }}">Назад</a>
    </div>
@endsection
