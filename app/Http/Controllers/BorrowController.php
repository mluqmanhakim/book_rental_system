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
        $rentals = new Borrow();
        $pending_rentals = $rentals->get_all_filtered_by_status('PENDING')
                                    ->where('reader_id', $user_id);
        $accepted_in_time_rentals = $rentals->get_all_filtered_by_status('ACCEPTED')
                                            ->where('deadline', '>=', Carbon::now())->where('reader_id', $user_id);
        $accepted_late_rentals = $rentals->get_all_filtered_by_status('ACCEPTED')
                                            ->where('deadline', '<', Carbon::now())->where('reader_id', $user_id);
        $rejected_rentals = $rentals->get_all_filtered_by_status('REJECTED')
                                    ->where('reader_id', $user_id);
        $returned_rentals = $rentals->get_all_filtered_by_status('RETURNED')
                                    ->where('reader_id', $user_id);
        
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
        $rentals = new Borrow();
        $pending_rentals = $rentals->get_all_filtered_by_status('PENDING');
        $accepted_in_time_rentals = $rentals->get_all_filtered_by_status('ACCEPTED')
                                            ->where('deadline', '>=', Carbon::now());
        $accepted_late_rentals = $rentals->get_all_filtered_by_status('ACCEPTED')
                                            ->where('deadline', '<', Carbon::now());
        $rejected_rentals = $rentals->get_all_filtered_by_status('REJECTED');
        $returned_rentals = $rentals->get_all_filtered_by_status('RETURNED');
         
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
        $validated_data['deadline'] = date('Y-m-d H:i:s', strtotime($validated_data['deadline']));
        $rental->update($validated_data);
        $user_id = Auth::id();

        if ($validated_data['status'] == 'RETURNED') {
            $rental->update([
                'return_managed_by' => $user_id,
                'returned_at' => Carbon::now()
            ]);
        }
        else {
            $rental->update([
                'request_managed_by' => $user_id,
                'request_processed_at' => Carbon::now()
            ]);
        }
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
