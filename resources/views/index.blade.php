@extends('layout.base')

@section('content')
<h1>Search book</h1>
<form action="{{ route('search_book') }}" method="POST">
    @csrf
    <div class="form-group">
        <input class="form-control @error('keyword') is-invalid @enderror" name="keyword" type="text" class="form-control" id="keyword">

        @error('keyword')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>

<br><br>

<div class="alert alert-primary" role="alert">
    Number of users: {{ $user_count }}
</div>
<div class="alert alert-primary" role="alert">
    Number of genres: {{ $genre_count }}
</div>
<div class="alert alert-primary" role="alert">
    Number of books: {{ $book_count }}
</div>
<div class="alert alert-primary" role="alert">
    Number of active book rentals: {{ $active_rental_count }}
</div>



<h1>Genres</h1>

@foreach ($genres as $genre)

<a href="{{ route('show_genre', $genre->id) }}">{{ $genre->name }}</a>

@endforeach



@endsection