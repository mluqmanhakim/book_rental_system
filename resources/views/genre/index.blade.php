@extends('layout.base')

@section('content')
<h1>Genres</h1>
<a href="{{ route('create_genre') }}" class="btn btn-primary">Add new genre</a>
<div>
@foreach ($genres as $genre)
<a href="{{ route('show_genre', $genre->id) }}">{{ $genre->name }}</a>
<p>{{ $genre->style }}</p>
<a href="{{ route('edit_genre', $genre->id) }}" class="btn btn-info">Edit</a>
<form action="{{ route('delete_genre', $genre->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>


<br><br>
@endforeach
</div>

@endsection