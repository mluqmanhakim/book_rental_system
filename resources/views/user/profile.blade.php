@extends('layout.base')

@section('extra_style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css
" rel="stylesheet">
@endsection
    

@section('content')

<div class="container">
    <div class="text-center">
        <img src="{{ asset('img/profile.png') }}" class="rounded mb-3" alt="Profile Image" width="100" height="100">
        {{-- <i class="fa-solid fa-square-user"></i> --}}
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <table class="table">
                <tr>
                    <td>Name</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        {{ $user->email }}
                    </td>
                </tr>
                <tr>
                    <td>Role</td>
                    @if ($user->is_librarian())
                    <td>Librarian</td>
                    @else
                    <td>Reader</td>
                    @endif
                </tr>
                
            </table>
        </div>
    </div>
</div>
@endsection