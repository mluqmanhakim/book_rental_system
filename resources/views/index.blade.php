@extends('layout.base')

@section('content')

<div class="jumbotron">
    <h1 class="display-4">Book Rental</h1>
    <p class="lead">A place where you will laugh</p>


    <h1>Search books</h1>

</div>

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


<h1>List of genres</h1>

@foreach ($genres as $genre)

<a href="{{ route('show_genre', $genre->id) }}">{{ $genre->name }}</a>

@endforeach



@endsection