@extends('layout.base')

@section('content')
<h1>Search books</h1>
<form>
  <div class="mb-3">
    <input type="text" class="form-control" id="" aria-describedby="">
  </div>
  <button type="submit" class="btn btn-primary">Search</button>
</form>

<br><br>

<div class="alert alert-primary" role="alert">
    Number of users
</div>
<div class="alert alert-primary" role="alert">
    Number of genres
</div>
<div class="alert alert-primary" role="alert">
    Number of books
</div>
<div class="alert alert-primary" role="alert">
    Number of active book rentals
</div>
<div class="alert alert-primary" role="alert">
    Number of active book rentals
</div>


<h1>Genres</h1>

@foreach ($genres as $genre)

<a href="{{ route('show_genre', $genre->id) }}">{{ $genre->name }}</a>

@endforeach



@endsection