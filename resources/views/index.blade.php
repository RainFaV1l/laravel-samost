@extends('layouts.index');

@section('title')
    <title>Главная страница</title>
@endsection

@section('content')
    <ul>
        @foreach($books as $book)
            <li>{{ $book->name }}</li>
        @endforeach
    </ul>
@endsection
