@extends('layout')
@section('title','Вход')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            @if(Auth::user())
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Здравствуйте, {{ Auth::user()->name }}</h5>
                        <a href="{{ url('logout') }}" class="btn btn-danger">Выйти</a>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Вход в систему</h5>
                        <form method="post" action="{{ url('auth') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">E-mail</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Пароль</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            @error('error')
                            <div class="alert alert-warning">{{ $message }}</div>
                            @enderror

                            <button class="btn btn-primary" type="submit">Войти</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
