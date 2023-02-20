@extends('layouts.index')

@section('title')
    <title>Главная страница</title>
@endsection

@section('content')
    <div class="books">
        @foreach($books as $book)
            <div class="books__item books-item">
                <div class="books-item__name">
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
                    <a href="{{ route('books.show.view', $book->id) }}" class="button">Подробнее</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
