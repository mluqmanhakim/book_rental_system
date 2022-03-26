<?php

namespace App\Http\Controllers;
use App\Models\Genre;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function show($id)
    {
        return view('genre.index');
    }
}
