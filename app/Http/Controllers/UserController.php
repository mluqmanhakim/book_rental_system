<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function show_user_profile()
    {
        $user = Auth::user();
        return view('user.profile', [
            'user' => $user
        ]);
    }
}
