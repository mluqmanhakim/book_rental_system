@extends('layout.base')

@section('content')

<div class="container">
    <h1>Rental Detail</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <tr>
                    <td class="fw-bold fs-3">Book</td>
                    <td></td>

                </tr>
                <tr>
                    <td>Title</td>
                    <td>{{ $rental->book->title }}</td>
                </tr>
                <tr>
                    <td>Authors</td>
                    <td>{{ $rental->book->authors }}</td>
                </tr>
                <tr>
                    <td>Release date</td>
                    <td>{{ $rental->book->released_at }}</td>
                </tr>
                <tr>
                    <td>Link</td>
                    <td><a href="{{ route('show_book', $rental->book->id) }}">Link</a></td>
                </tr>
                <tr>
                    <td class="fw-bold fs-3">Rental</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Borrower's name</td>
                    <td>{{ $rental->user->name }}</td>
                </tr>
                <tr>
                    <td>Date of rental request</td>
                    <td>{{ $rental->created_at }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td class="text-primary">{{ $rental->status }}</td>
                </tr>
                @if($rental->status != 'PENDING')
                <tr>
                    <td>Date of procession</td>
                    <td>{{ $rental->request_processed_at }}</td>
                </tr>
                <tr>
                    <td>Request is processed by</td>
                    <td>{{ $rental->managed_request_user->name }}</td>
                </tr>
                @endif
                @if($rental->status == 'RETURNED')
                <tr>
                    <td>Date of return</td>
                    <td>{{ $rental->returned_at }}</td>
                </tr>
                <tr>
                    <td>Return is managed by</td>
                    <td> {{ $rental->managed_return_user->name }}</td>
                </tr>
                @endif
            </table>
        </div>
    </div>
</div>

@if(Auth::user()->is_librarian())
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <h1>Set status and deadline</h1>
            <form action="{{ route('update_rental', $rental->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3 col-md-2">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="PENDING" {{ (old('status', $rental->status) == "PENDING" ? "selected":"")
                            }}>PENDING</option>
                        <option value="REJECTED" {{ (old('status', $rental->status) == "REJECTED" ? "selected":"")
                            }}>REJECTED
                        </option>
                        <option value="ACCEPTED" {{ (old('status', $rental->status) == "ACCEPTED" ? "selected":"")
                            }}>ACCEPTED
                        </option>
                        <option value="RETURNED" {{ (old('status', $rental->status) == "RETURNED" ? "selected":"")
                            }}>RETURNED
                        </option>
                    </select>
                </div>

                <div class="form-group mb-3 col-md-2">
                    <label for="deadline">Deadline</label>
                    <input name="deadline" type="datetime-local"
                        class="form-control @error('deadline') is-invalid @enderror" id="deadline" placeholder=""
                        value="{{ old('deadline', $deadline) }}">
                    @error('deadline')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection