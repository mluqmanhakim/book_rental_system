<?php

namespace App\Http\Controllers;
use App\Models\Genre;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genre.index', [
            'genres' => $genres
        ]);
    }

    public function show($id)
    {
        $genre = Genre::find($id);
        return view('genre.detail', [
            'genre' => $genre
        ]);
    }

    public function create()
    {
        return view('genre.create');
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'style' => 'required',
        ]);
        $genre = Genre::create($validated_data);
        return redirect()->route('genre_index');
    }

    public function edit($id)
    {
        $genre = Genre::find($id);
        return view('genre.edit', [
            'genre' => $genre
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated_data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'style' => 'required',
        ]);
        $genre = Genre::find($id);
        $genre->update($validated_data);
        return redirect()->route('genre_index');
    }

    public function destroy($id)
    {
        $genre = Genre::find($id);
        $genre->delete();
        return redirect()->route('genre_index');
    }

}
