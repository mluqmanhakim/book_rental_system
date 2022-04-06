@extends('layout.base')

@section('content')
<h1>Search result for "{{ $keyword }}":</h1>
@if ($books->count() < 1) 
<p>No book found</p>
@else
    @foreach ($books as $book)
    <a href="{{ route('show_book', $book->id) }}">{{ $book->title }}</a>
    <p>{{ $book->authors }}</p>
    <p>{{ $book->released_at }}</p>
    <p>{{ $book->description }}</p>
    <br><br>
    @endforeach
@endif

@endsection