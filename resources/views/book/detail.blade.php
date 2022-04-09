@extends('layout.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="container mb-3">
                @auth
                @if(Auth::user()->is_librarian())
                <div class="row">
                    <div class="col-md-1">
                        <div class="d-grid">
                            <a href="{{ route('edit_book', $book->id) }}" class="btn btn-primary btn-block">Edit</a>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <form class="inline" action="{{ route('delete_book', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
                @else
                @if ($book->allowed_to_borrow(Auth::id()))
                <a href="{{ route('borrow_book', $book->id) }}" class="btn btn-primary mb-3">Borrow this book</a>
                @else
                <div class="alert alert-primary" role="alert">
                    You are currently borrowing this book
                </div>
                @endif
                @endif
                @endauth
            </div>

            <div class="container">
                <h3>{{ $book->title }}</h3>
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ $book->cover_image }}" alt="Book cover" width="200" height="300">
                    </div>
                    <div class="col-md-9">
                        <p><span class="text-primary fw-bold">Authors<br></span>
                            {{ $book->authors }}
                        </p>
                        <p><span class="text-primary fw-bold">Release date<br></span>
                            {{ $book->released_at }}
                        </p>
                        <p><span class="text-primary fw-bold">Pages<br></span>
                            {{ $book->pages }}
                        </p>
                        <p><span class="text-primary fw-bold">Language<br></span>
                            {{ $book->language_code }}
                        </p>
                        <p><span class="text-primary fw-bold">ISBN<br></span>
                            {{ $book->isbn }}
                        </p>
                        <p><span class="text-primary fw-bold">Number of copy in the library<br></span>
                            {{ $book->in_stock }}
                        </p>
                        <p><span class="text-primary fw-bold">Number of available copy<br></span>
                            {{ $book->available_books() }}
                        </p>
                        <p><span class="text-primary fw-bold">Description<br></span>
                            {{ $book->description }}
                        </p>
                        <p><span class="text-primary fw-bold">Genres<br></span>
                            @foreach($book->genres as $genre)
                            <a class="badge bg-danger" href="{{ route('show_genre', $genre->id) }}">{{ $genre->name
                                }}</a>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection