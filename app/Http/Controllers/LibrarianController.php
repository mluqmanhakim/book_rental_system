<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function create_book()
    {
        $genres = Genre::all();
        return view('book.create', [
            'genres' => $genres
        ]);
    }
}
