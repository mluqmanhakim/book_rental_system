<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function create()
    {
        Gate::authorize('librarian', Auth::user());
        $genres = Genre::all();
        return view('book.create', [
            'genres' => $genres
        ]);
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required|max:255',
            'authors' => 'required|max:255',
            'released_at' => 'required|date|before:now',
            'pages' => 'required|numeric|min:1',
            'isbn' => 'required|regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i',
            'description' => 'nullable',
            'genres' => 'nullable|array',
            'in_stock' => 'required|numeric|min:0'
        ]);
        $book = Book::create($validated_data);
        $book->genres()->sync($validated_data['genres'] ?? []);
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $genres = Genre::all();
        return view('book.edit', [
            'book' => $book,
            'genres' => $genres
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated_data = $request->validate([
            'title' => 'required|max:255',
            'authors' => 'required|max:255',
            'released_at' => 'required|date|before:now',
            'pages' => 'required|numeric|min:1',
            'isbn' => 'required|regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i',
            'description' => 'nullable',
            'genres' => 'nullable|array',
            'in_stock' => 'required|numeric|min:0'
        ]);
        $book = Book::find($id);
        $book->update($validated_data);
        $book->genres()->sync($validated_data['genres'] ?? []);
        return redirect()->route('show_book', $book->id);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('home');
    }
}
