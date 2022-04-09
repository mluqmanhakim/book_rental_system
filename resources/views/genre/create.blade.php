@extends('layout.base')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">


            <h1>Add new genre</h1>

            <form action="{{ route('store_genre') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="" value="{{ old('name', '') }}">

                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="style">Style</label>
                    <select name="style" class="form-control" id="style">
                        <option value="primary" {{ (old("style")=="primary" ? "selected" :"") }}>primary</option>
                        <option value="secondary" {{ (old("style")=="secondary" ? "selected" :"") }}>secondary</option>
                        <option value="success" {{ (old("style")=="success" ? "selected" :"") }}>success</option>
                        <option value="danger" {{ (old("style")=="danger" ? "selected" :"") }}>danger</option>
                        <option value="warning" {{ (old("style")=="warning" ? "selected" :"") }}>warning</option>
                        <option value="info" {{ (old("style")=="info" ? "selected" :"") }}>info</option>
                        <option value="light" {{ (old("style")=="light" ? "selected" :"") }}>light</option>
                        <option value="dark" {{ (old("style")=="dark" ? "selected" :"") }}>dark</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection