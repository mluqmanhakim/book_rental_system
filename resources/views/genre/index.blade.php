@extends('layout.base')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h1>Genres</h1>
            <a href="{{ route('create_genre') }}" class="btn btn-primary">Add new genre</a>

            <div class="row mt-3">
                @foreach ($genres as $genre)
                <div class="col-md-6">
                    <div class="alert alert-{{ $genre->style }}" role="alert">
                        <div class="row">
                            <div class="col-md-9">
                                <a href="{{ route('show_genre', $genre->id) }}">
                                    <h4>{{ $genre->name }}</h4>
                                </a>
                                <p>Style: {{ $genre->style }}</p>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex align-items-end">
                                    <a href="{{ route('edit_genre', $genre->id) }}"
                                        class="w-100 btn btn-outline-dark btn-sm">Edit</a>
                                    <form action="{{ route('delete_genre', $genre->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-100 btn btn-outline-dark btn-sm">Delete</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection