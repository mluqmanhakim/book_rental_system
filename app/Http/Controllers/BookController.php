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
}
