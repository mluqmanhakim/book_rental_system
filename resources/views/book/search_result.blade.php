@extends('layout.base')

@section('content')
<div class="container">
    <h1>Search result for "{{ $keyword }}":</h1>

    @if ($books->count() < 1) 
    <div class="alert alert-danger" role="alert">
        No book found. Back to homepage to search another book.
    </div>
    @else
    <p>{{ $books->count() }} books found.</p>
    @foreach ($books as $book)
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-body">

                    <a href="{{ route('show_book', $book->id) }}">
                        <h3>{{ $book->title }}</h3>
                    </a>
                    <p>Authors: {{ $book->authors }}</p>
                    <p>Release date: {{ $book->released_at }}</p>
                    <p>Description: {{ $book->description }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
@endsection