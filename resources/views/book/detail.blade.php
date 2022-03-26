@extends('layout.base')

@section('content')

<a href="#" class="btn btn-primary">Borrow</a>


<h3>{{ $book->title }}</h3>
Author: {{ $book->authors }}
<br>
Released at: {{ $book->released_at }}
<br>
Description: {{ $book->description }}
<br>
Pages: {{ $book->pages }}
<br>
Genres:
@foreach($book->genres as $genre)
<a href="{{ route('show_genre', $genre->id) }}">{{ $genre->name }}</a>
@endforeach
<br>
Language: {{ $book->language_code }}
<br>
ISBN: {{ $book->isbn }}
<br>
Number of this book in the library: {{ $book->in_stock }}
<br>
Number of available books: 
<br>
Cover image 
<img src="{{ $book->cover_image }}" alt="Girl in a jacket" width="200" height="300">
<br>

@endsection