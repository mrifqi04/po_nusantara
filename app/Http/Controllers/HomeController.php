<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JamOperasional;
use App\Models\Service;
use App\Models\Booking;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    function index() {

        $jams = JamOperasional::all();
        $services = Service::all();

        return view('frontend.homepage', compact('jams', 'services'));
    }

    function bookingRequest(Request $request) {
        // dd($request);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|min:11|max:13',
            'tanggal' => 'required',
            'jam' => 'required',
            'service_id' => 'required',
        ]);

        $booking = Booking::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'tanggal' => $request->tanggal,
            'jam_id' => $request->jam,
            'service_id' => $request->service_id,
            'messages' => $request->messages,
            'status' => 'PENDING',
        ]);

        session()->flash('msg','Permintaan booking sudah kami terima');

        return redirect('/');
    }

    function getDataBooking(Request $request) {

        $jam['data'] = Booking::where('status', 'PENDING')
        ->orWhere('status', 'ACCEPTED')
        ->where('service_id', $request->service_id)
        ->get();

        echo json_encode($jam);
        exit;
    }

    function bookingStatus() {

         // Taking data
         $bookings = Booking::with('service')
         ->where('user_id', Auth::user()->id)
         ->where('status', 'PENDING')
         ->orWhere('status', 'ACCEPTED')
         ->get();

         
 
         // Directing to template with data
         return view('frontend.cekstatus.booking.index', compact('bookings'));
    }

    function transaksiStatus() {

        // Taking data
        $transactions = Booking::with('service')
        ->where('status', 'DONE')        
        ->get();

        $dokter['dokter'] = User::where('role_id', 3)->first();
        $data = $dokter;

        // Directing to template with data
        return view('frontend.cekstatus.transaksi.index', $data, compact('transactions'));
   }
}
