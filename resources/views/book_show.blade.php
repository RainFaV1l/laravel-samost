@extends('layouts.index')

@section('title')
    <title>{{ $book['name'] }}</title>
@endsection

@section('content')
    <div class="book">
        <div class="book__row">
            <div class="book__img">
                <img src="{{ $book->image_url }}" alt="{{ $book['name'] }}">
            </div>
            <div class="books__column">
                <div class="books-item__name">
                    Название: {{ $book['name'] }}
                </div>
                <div class="books-item__name">
                    Описание: {{ $book['description'] }}
                </div>
                <div class="books-item__name accent">
                    Автор: {{ $book->author()->name }}
                </div>
            </div>
        </div>
    </div>
@endsection
