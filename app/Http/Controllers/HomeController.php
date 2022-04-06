<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('index', [
            'genres' => $genres
        ]);
    }

    public function show_user_profile()
    {
        $user = Auth::user();
        return view('user.profile', [
            'user' => $user
        ]);
    }
}
