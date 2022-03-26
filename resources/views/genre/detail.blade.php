@extends('layout.base')

@section('content')

<h1>{{ $genre->name }}</h1>

@foreach($genre->books as $book)
<div>
<a href="{{ route('show_book', $book->id) }}"><h3>{{ $book->title }}</h3></a>
<p>{{ $book->authors }}</p>
<p>{{ $book->released_at }}</p>
<p>{{ $book->description }}</p>
</div>
<br><br>
@endforeach

@endsection