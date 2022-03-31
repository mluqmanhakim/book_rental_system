<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show($id)
    {
        $book = Book::find($id);
        // dd($book->genres);
        return view('book.detail', [
            'book' => $book
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
}
