@extends('layout.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="alert alert-primary" role="alert">
                Number of users <h1>{{ $user_count }}</h1>
            </div>

        </div>
        <div class="col-md-3">
            <div class="alert alert-warning" role="alert">
                Number of genres <h1>{{ $genre_count }}</h1>
            </div>

        </div>
        <div class="col-md-3">
            <div class="alert alert-success" role="alert">
                Number of books <h1>{{ $book_count }}</h1>
            </div>

        </div>
        <div class="col-md-3">
            <div class="alert alert-danger" role="alert">
                Number of active book rentals <h1>{{ $active_rental_count }}</h1>
            </div>

        </div>
    </div>
</div>

<div class="container">
    <h1>Search book</h1>
    <div class="row">
        <div class="col-md-12">
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
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="container mt-3">
    <h1>Genres</h1>
    <div class="row">
        @foreach ($genres as $genre)
        <div class="col-md-3">
            <div class="alert alert-secondary" role="alert">
                <a href="{{ route('show_genre', $genre->id) }}">{{ $genre->name }}</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection