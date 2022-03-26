<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Genre;
use App\Models\Borrow;
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

    public function show_my_rental()
    {
        $pending_rentals = Borrow::where('status', 'PENDING')->get();
        $accepted_in_time_rentals = Borrow::where('status', 'ACCEPTED')
                                        ->where('deadline', '>', Carbon::now())->get();
        $accepted_late_rentals = Borrow::where('status', 'ACCEPTED')
                                        ->where('deadline', '<', Carbon::now())->get();
        $rejected_rentals = Borrow::where('status', 'REJECTED')->get();
        $returned_rentals = Borrow::where('status', 'RETURNED')->get();
        
        return view('rental.my_rental', [
            'pending_rentals' => $pending_rentals,
            'accepted_in_time_rentals' => $accepted_in_time_rentals,
            'accepted_late_rentals' => $accepted_late_rentals,
            'rejected_rentals' => $rejected_rentals,
            'returned_rentals' => $returned_rentals
        ]);
    }
}
