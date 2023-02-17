@extends('layouts.index');

@section('title')
    <title>Авторизация</title>
@endsection

@section('content')
    <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input value="{{ old('name') }}" type="text" name="name" placeholder="Имя"><br>
        <input type="password" name="password" placeholder="Пароль"><br>
        <input type="submit" class="button" value="Войти">
    </form>
@endsection
