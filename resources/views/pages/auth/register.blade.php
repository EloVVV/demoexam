@extends('layouts.layout')

@section('title', 'Register')

@section('content')
    <section>
        <h1>Register</h1>

        @include('components.errors')

        <form action="{{ route('auth.createUser') }}" method="POST">
            @csrf

            <input type="text" name="name" placeholder="Имя">
            <input type="text" name="surname" placeholder="Фамилия">
            <input type="text" name="midname" placeholder="Отчество">
            <input type="text" name="login" placeholder="Имя пользователя">
            <input type="email" name="email" placeholder="Адрес эл. почты">
            <input type="password" name="password" placeholder="Секретный пароль...">
            <input type="password" name="repeat_password" placeholder="Повторите секретный пароль...">

            <label>
                <input type="checkbox" name="rules">
                Я согласен(на) с правилами регистрации
            </label>

            <button type="submit">Регистрация</button>
        </form>
    </section>
@endsection
