@extends('layout.base')

@section('content')

<p>{{ $user->name }}</p>

<p>{{ $user->email }}</p>

@if ($user->is_librarian())
<p>Librarian</p>
@else
<p>Reader</p>
@endif

@endsection