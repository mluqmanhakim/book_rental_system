@extends('layout.base')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h1>Edit genre</h1>

            <form action="{{ route('update_genre', $genre->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="" value="{{ old('name', $genre->name) }}">

                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="style">Style</label>
                    <select name="style" class="form-control" id="style">
                        <option value="primary" {{ (old('style', $genre->style) == "primary" ? "selected":"") }}>primary
                        </option>
                        <option value="secondary" {{ (old('style', $genre->style) == "secondary" ? "selected":"")
                            }}>secondary</option>
                        <option value="success" {{ (old('style', $genre->style) == "success" ? "selected":"") }}>success
                        </option>
                        <option value="danger" {{ (old('style', $genre->style) == "danger" ? "selected":"") }}>danger
                        </option>
                        <option value="warning" {{ (old('style', $genre->style) == "warning" ? "selected":"") }}>warning
                        </option>
                        <option value="info" {{ (old('style', $genre->style) == "info" ? "selected":"") }}>info</option>
                        <option value="light" {{ (old('style', $genre->style) == "light" ? "selected":"") }}>light
                        </option>
                        <option value="dark" {{ (old('style', $genre->style) == "dark" ? "selected":"") }}>dark</option>
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