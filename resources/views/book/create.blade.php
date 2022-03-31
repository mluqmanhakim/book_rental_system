@extends('layout.base')
@section('content')
<h1>Add new book</h1>

<form action="{{ route('store_book') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="" value="{{ old('title', '') }}">

        @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="authors">Authors</label>
        <input name="authors" type="text" class="form-control @error('authors') is-invalid @enderror" id="authors" placeholder="" value="{{ old('authors', '') }}">

        @error('authors')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="released_at">Date released</label>
        <input name="released_at" type="date" class="form-control @error('released_at') is-invalid @enderror" id="released_at" placeholder="" value="{{ old('released_at', '') }}">

        @error('released_at')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="pages">Pages</label>
        <input name="pages" type="number" class="form-control @error('pages') is-invalid @enderror" id="pages" placeholder="" value="{{ old('pages', '') }}">

        @error('pages')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="isbn">ISBN</label>
        <input name="isbn" type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" placeholder="" value="{{ old('isbn', '') }}">

        @error('isbn')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ old('description', '')  }}</textarea>

        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group flex-wrap">
        <label for="genres">Genres</label>
        @foreach ($genres as $genre)
        <div class="custom-control custom-switch col-sm-2">
            <input name="genres[]" value="{{ $genre->id }}" type="checkbox" class="custom-control-input" id="genre{{ $genre->id }}">
            <label class="custom-control-label" for="genre{{ $genre->id }}">{{ $genre->name }}</label>
        </div>
        @endforeach
    </div>

    <div class="form-group">
        <label for="in_stock">Stock</label>
        <input name="in_stock" type="number" class="form-control @error('in_stock') is-invalid @enderror" id="in_stock" placeholder="" value="{{ old('in_stock', '') }}">

        @error('in_stock')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>



    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

</form>
@endsection