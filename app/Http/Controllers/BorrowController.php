<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function show($id)
    {
        $rental = Borrow::find($id);
        return view('rental.detail', [
            'rental' => $rental
        ]);
    }
}
