@extends('layout.base')

@section('content')

@auth
@if(Auth::user()->is_librarian())
<a href="{{ route('edit_book', $book->id) }}" class="btn btn-primary">Edit</a>
<form action="{{ route('delete_book', $book->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
@else
@if ($book->allowed_to_borrow(Auth::id()))
<a href="{{ route('borrow_book', $book->id) }}" class="btn btn-primary">Borrow</a>
@else

<div class="alert alert-primary" role="alert">
    You are currently borrowing this book
</div>
@endif
@endif
@endauth


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