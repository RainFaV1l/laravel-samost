@extends('layouts.index');

@section('title')
    <title>Регистрация</title>
@endsection

@section('content')
    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input value="{{ old('name') }}" type="text" name="name" placeholder="Имя"><br>
        <input type="password" name="password" placeholder="Пароль"><br>
        <input type="password" name="re_password" placeholder="Повторите пароль"><br>
        <input type="submit" class="button" value="Создать">
    </form>
@endsection
