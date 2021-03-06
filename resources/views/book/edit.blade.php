@extends('layout.base')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1"></div>


        <h1>Edit book</h1>

        <form action="{{ route('update_book', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    placeholder="" value="{{ old('title', $book->title) }}">

                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="authors">Authors</label>
                <input name="authors" type="text" class="form-control @error('authors') is-invalid @enderror"
                    id="authors" placeholder="" value="{{ old('authors', $book->authors) }}">

                @error('authors')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-3 col-md-2">
                <label for="released_at">Date released</label>
                <input name="released_at" type="date" class="form-control @error('released_at') is-invalid @enderror"
                    id="released_at" placeholder="" value="{{ old('released_at', $book->released_at) }}">

                @error('released_at')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="pages">Pages</label>
                <input name="pages" type="number" class="form-control @error('pages') is-invalid @enderror" id="pages"
                    placeholder="" value="{{ old('pages', $book->pages) }}">

                @error('pages')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="isbn">ISBN</label>
                <input name="isbn" type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn"
                    placeholder="" value="{{ old('isbn', $book->isbn) }}">

                @error('isbn')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" rows="7" class="form-control @error('description') is-invalid @enderror"
                    id="description" rows="3">{{ old('description', $book->description)  }}</textarea>

                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group row mb-3">
                <label for="genres">Genres</label>
                @foreach ($genres as $genre)
                <div class="col-md-2">
                    <input name="genres[]" value="{{ $genre->id }}" type="checkbox" class=""
                        id="genre{{ $genre->id }}" @if ($book->genres->contains($genre->id)) checked @endif>
                    <label class="" for="genre{{ $genre->id }}">{{ $genre->name }}</label>
                </div>
                @endforeach
            </div>

            <div class="form-group mb-3">
                <label for="in_stock">Stock</label>
                <input name="in_stock" type="number" class="form-control @error('in_stock') is-invalid @enderror"
                    id="in_stock" placeholder="" value="{{ old('in_stock', $book->in_stock) }}">

                @error('in_stock')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('show_book', $book->id) }}" class="btn btn-danger">Cancel</a>
            </div>
            
        </form>
    </div>
</div>
@endsection