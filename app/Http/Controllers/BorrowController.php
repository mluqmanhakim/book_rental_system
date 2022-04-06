<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
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
                            ->where('status', 'PENDING')->get();
        $accepted_in_time_rentals = Borrow::where('reader_id', $user_id)
                                    ->where('status', 'ACCEPTED')
                                    ->where('deadline', '>', Carbon::now())->get();
        $accepted_late_rentals = Borrow::where('reader_id', $user_id)
                                    ->where('status', 'ACCEPTED')
                                    ->where('deadline', '<', Carbon::now())->get();
        $rejected_rentals = Borrow::where('reader_id', $user_id)
                            ->where('status', 'REJECTED')->get();
        $returned_rentals = Borrow::where('reader_id', $user_id)
                            ->where('status', 'RETURNED')->get();
        
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
        $pending_rentals = Borrow::where('status', 'PENDING')->get();
        $accepted_in_time_rentals = Borrow::where('status', 'ACCEPTED')
                                    ->where('deadline', '>', Carbon::now())->get();
        $accepted_late_rentals = Borrow::where('status', 'ACCEPTED')
                                    ->where('deadline', '<', Carbon::now())->get();
        $rejected_rentals = Borrow::where('status', 'REJECTED')->get();
        $returned_rentals = Borrow::where('status', 'RETURNED')->get();
        
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
        $validated_data = $request->validate([
            'deadline' => 'required|date|after:now',
            'status' => 'required',
        ]);
        $rental = Borrow::find($id);
        $rental->update($validated_data);
        return redirect()->route('show_rental', $rental->id);
    }
}
