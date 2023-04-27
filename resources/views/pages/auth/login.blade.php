@extends('layouts.layout')

@section('title', 'Login')

@section('content')
    <section>
        <h1>Login</h1>

        @include('components.errors')
        
        <form action="{{ route('auth.loginUser') }}" method="POST">
            @csrf

            <input type="text" name="login" placeholder="Имя пользователя">
            <input type="password" name="password" placeholder="Секретный пароль...">

            <button type="submit">Регистрация</button>
        </form>
    </section>
@endsection
