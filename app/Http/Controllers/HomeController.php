<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        // dd($genres);
        return view('index', [
            'genres' => $genres
        ]);
    }
}
