<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BorrowController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function show($id)
    {
        $rental = Borrow::find($id);
        is_null($rental->deadline) ? $deadline = date("Y-m-d\TH:i", strtotime(Carbon::now())) : $deadline = date("Y-m-d\TH:i", strtotime($rental->deadline));
        
        return view('rental.detail', [
            'rental' => $rental,
            'deadline' => $deadline
        ]);
    }
    public function show_my_rental()
    {
        $user_id = Auth::id();
        $pending_rentals = Borrow::where('reader_id', $user_id)
                            ->where('status', 'PENDING')
                            ->join('books', 'borrows.book_id', '=', 'books.id')
                            ->whereNull('books.deleted_at')
                            ->orderBy('borrows.created_at', 'desc')
                            ->get();

        $accepted_in_time_rentals = Borrow::where('reader_id', $user_id)
                                    ->where('status', 'ACCEPTED')
                                    ->where('deadline', '>', Carbon::now())
                                    ->join('books', 'borrows.book_id', '=', 'books.id')
                                    ->whereNull('books.deleted_at')
                                    ->orderBy('borrows.created_at', 'desc')
                                    ->get();

        $accepted_late_rentals = Borrow::where('reader_id', $user_id)
                                    ->where('status', 'ACCEPTED')
                                    ->where('deadline', '<', Carbon::now())
                                    ->join('books', 'borrows.book_id', '=', 'books.id')
                                    ->whereNull('books.deleted_at')
                                    ->orderBy('borrows.created_at', 'desc')
                                    ->get();

        $rejected_rentals = Borrow::where('reader_id', $user_id)
                            ->where('status', 'REJECTED')
                            ->join('books', 'borrows.book_id', '=', 'books.id')
                            ->whereNull('books.deleted_at')
                            ->orderBy('borrows.created_at', 'desc')
                            ->get();

        $returned_rentals = Borrow::where('reader_id', $user_id)
                            ->where('status', 'RETURNED')
                            ->join('books', 'borrows.book_id', '=', 'books.id')
                            ->whereNull('books.deleted_at')
                            ->orderBy('borrows.created_at', 'desc')
                            ->get();
        
        return view('rental.my_rental', [
            'pending_rentals' => $pending_rentals,
            'accepted_in_time_rentals' => $accepted_in_time_rentals,
            'accepted_late_rentals' => $accepted_late_rentals,
            'rejected_rentals' => $rejected_rentals,
            'returned_rentals' => $returned_rentals
        ]);
    }

    public function show_rentals()
    {
        Gate::authorize('librarian', Auth::user());
        $pending_rentals = Borrow::where('status', 'PENDING')
                            ->join('books', 'borrows.book_id', '=', 'books.id')
                            ->whereNull('books.deleted_at')
                            ->orderBy('borrows.created_at', 'desc')
                            ->get();
        $accepted_in_time_rentals = Borrow::where('status', 'ACCEPTED')
                                    ->where('deadline', '>', Carbon::now())
                                    ->join('books', 'borrows.book_id', '=', 'books.id')
                                    ->whereNull('books.deleted_at')
                                    ->orderBy('borrows.created_at', 'desc')
                                    ->get();
        $accepted_late_rentals = Borrow::where('status', 'ACCEPTED')
                                    ->where('deadline', '<', Carbon::now())
                                    ->join('books', 'borrows.book_id', '=', 'books.id')
                                    ->whereNull('books.deleted_at')
                                    ->orderBy('borrows.created_at', 'desc')
                                    ->get();
        $rejected_rentals = Borrow::where('status', 'REJECTED')
                                    ->join('books', 'borrows.book_id', '=', 'books.id')
                                    ->whereNull('books.deleted_at')
                                    ->orderBy('borrows.created_at', 'desc')
                                    ->get();
        $returned_rentals = Borrow::where('status', 'RETURNED')
                            ->join('books', 'borrows.book_id', '=', 'books.id')
                            ->whereNull('books.deleted_at')
                            ->orderBy('borrows.created_at', 'desc')
                            ->get();
        
        return view('rental.index', [
            'pending_rentals' => $pending_rentals,
            'accepted_in_time_rentals' => $accepted_in_time_rentals,
            'accepted_late_rentals' => $accepted_late_rentals,
            'rejected_rentals' => $rejected_rentals,
            'returned_rentals' => $returned_rentals
        ]);
    }

    public function update(Request $request, $id)
    {
        Gate::authorize('librarian', Auth::user());
        $validated_data = $request->validate([
            'deadline' => 'required|date|after:now',
            'status' => 'required',
        ]);
        $rental = Borrow::find($id);
        $rental->update($validated_data);
        return redirect()->route('show_rental', $rental->id);
    }

    public function borrow_book($id)
    {
        $user_id = Auth::id();
        $rental = Borrow::create([
            'reader_id' => $user_id,
            'book_id' => $id,
            'status' => "PENDING"
        ]);
        return redirect()->route('show_book', $id);
    }
}
