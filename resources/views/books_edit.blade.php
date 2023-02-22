@extends('layouts.index')

@section('title')
    <title>Редактирование книги</title>
@endsection

@section('content')
    <div class="login">
        <h1>Редактирование книги</h1>
        <form action="{{ route('books.edit', $book) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input__div" >
                <input class="@error('name') error_active @enderror" value="{{ $book['name'] }}" type="text" name="name" placeholder="Название">
                @error('name')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input__div" >
                <input class="@error('description') error_active @enderror" value="{{ $book['description'] }}" type="text" name="description" placeholder="Описание">
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
            <div class="input__div" >
                <select name="category">
                    @foreach($categories as $category)
                        <option
                            @if($article->category_id === $category['id'])
                                selected
                            @endif
                            value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
                @error('description')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <input type="submit" class="button" value="Сохранить">
        </form>
    </div>
@endsection
