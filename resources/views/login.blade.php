@extends('layouts.index')

@section('title')
    <title>Авторизация</title>
@endsection

@section('content')
    <div class="login">
        <h1>Авторизация</h1>
        @error('invalid') <div class="error__text">{{ $message }}</div> @enderror
        <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input__div" >
                <input class="@error('name') error_active @enderror" value="{{ old('name') }}" type="text" name="name" placeholder="Логин">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input__div">
                <input class="@error('password') error_active @enderror" type="password" name="password" placeholder="Пароль">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <input type="submit" class="button" value="Авторизоваться">
        </form>
    </div>
@endsection
