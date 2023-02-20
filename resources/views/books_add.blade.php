@extends('layouts.index')

@section('title')
    <title>Добавление книги</title>
@endsection

@section('content')
    <div class="login">
        <h1>Добавление книги</h1>
        <form action="{{ route('books.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input__div" >
                <input class="@error('name') error_active @enderror" value="{{ old('name') }}" type="text" name="name" placeholder="Название">
                @error('name')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input__div" >
                <input class="@error('description') error_active @enderror" value="{{ old('description') }}" type="text" name="description" placeholder="Описание">
                @error('description')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input__div" >
                <input class="@error('file') error_active @enderror" type="file" name="file">
                @error('file')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <input type="submit" class="button" value="Добавить">
        </form>
    </div>
@endsection
