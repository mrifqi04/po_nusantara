<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;

class BookingController extends Controller
{
    function index() {
        // Taking data
        $bookings = Booking::with('service')
        ->where('status', 'PENDING')
        ->orWhere('status', 'ACCEPTED')
        ->get();

        // Directing to template with data
        return view('admin.booking.index', compact('bookings'));
    }

    function store (Request $request) {
        
        $booking = Booking::find($request->booking_id);  
        $dokter = User::where('role_id', 3)->first();          

        if ($booking->status == 'PENDING') {

            //update data
            $booking->update([
                'status' => 'ACCEPTED',
                'dokter_id' => $dokter->id
            ]);

            // Store a message
            session()->flash('msg','Booking request has been accepted');
        } else if ($booking->status == 'ACCEPTED') {
            //update data
            $booking->update(['status' => 'DONE']);

            // Store a message
            session()->flash('msg','Booking request has been success');
        }


        // Redirect back
        return redirect('admin/booking-request');
    }
}
