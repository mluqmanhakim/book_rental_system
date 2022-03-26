@extends('layout.base')

@section('content')
<h1>Book</h1>
<a href="{{ route('show_book', $rental->book->id) }}"><h3>{{ $rental->book->title }}</h3></a>

<h1>Rental</h1>
Borrower name: {{ $rental->user->name }}
<br>

Date of rental request: {{ $rental->created_at }}
<br>
Status: {{ $rental->status }}
<br>
@if($rental->status != 'PENDING')
Date of procession: {{ $rental->request_processed_at }}
Librarian's name: {{ $rental->managed_request_user->name }}
@endif
<br>
@if($rental->status == 'RETURNED')
Date of return: {{ $rental->returned_at }}
Librarian's name {{ $rental->managed_return_user->name }}
@endif

@endsection