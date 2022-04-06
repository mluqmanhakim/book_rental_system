<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $user_count = User::all()->count();
        $genre_count = $genres->count();
        $book_count = Book::all()->count();
        $active_rental_count = Borrow::where('status', 'ACCEPTED')->get()->count();
        return view('index', [
            'genres' => $genres,
            'user_count' => $user_count,
            'genre_count' => $genre_count,
            'book_count' => $book_count,
            'active_rental_count' => $active_rental_count
        ]);
    }

    public function search_book(Request $request)
    {
        $validated_data = $request->validate([
            'keyword' => 'required'
        ]);
        $books = Book::where('title', 'like', '%' . $validated_data['keyword'] . '%')
                    ->orWhere('authors', 'like', '%' . $validated_data['keyword'] . '%')
                    ->get();
        
        return view('book.search_result', [
            'books' => $books,
            'keyword' => $validated_data['keyword']
        ]);
    }

    public function show_genre($id)
    {
        $genre = Genre::find($id);
        return view('genre.detail', [
            'genre' => $genre
        ]);
    }

    public function show_book($id)
    {
        $book = Book::find($id);
        return view('book.detail', [
            'book' => $book
        ]);
    }
}
