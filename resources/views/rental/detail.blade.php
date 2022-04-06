@extends('layout.base')

@section('content')
<h1>Rental Detail</h1>

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

@if(Auth::user()->is_librarian())
<h1>Set status and deadline</h1>
<form action="{{ route('update_rental', $rental->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" id="status">
            <option value="PENDING" {{ (old('status', $rental->status) == "PENDING" ? "selected":"") }}>PENDING</option>
            <option value="REJECTED" {{ (old('status', $rental->status) == "REJECTED" ? "selected":"") }}>REJECTED</option>
            <option value="ACCEPTED" {{ (old('status', $rental->status) == "ACCEPTED" ? "selected":"") }}>ACCEPTED</option>
            <option value="RETURNED" {{ (old('status', $rental->status) == "RETURNED" ? "selected":"") }}>RETURNED</option>
            
        </select>
    </div>
    {{$rental->deadline}}
    <div class="form-group">
        <label for="deadline">Deadline</label>
        <input name="deadline" type="datetime-local" class="form-control @error('deadline') is-invalid @enderror" id="deadline" placeholder="" value="{{ old('deadline', $rental->deadline) }}">

        @error('deadline')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

</form>
@endif

@endsection