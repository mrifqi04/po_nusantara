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

        $depatures = Service::select('depature')->distinct()->get();        
        $arrivals = Service::select('arrival')->distinct()->get();        

        return view('frontend.homepage', 
        compact(
            'jams', 
            'services', 
            'depatures',
            'arrivals'
        ));
    }

    function bookingRequest(Request $request) {
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|min:11|max:13',            
            'service_id' => 'required',
        ]);        

        Booking::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,                        
            'service_id' => $request->service_id,            
            'status' => 'PENDING',
        ]);

        session()->flash('msg','Permintaan booking sudah kami terima');


        return redirect('/');
    }

    function getServiceLists(Request $request) {
        
        $depature = $request->depature;
        $arrival = $request->arrival;
        
        if ($depature) {
            $get_data = Service::where('depature', $depature)->get();
        } else {
            $get_data = Service::where('arrival', $arrival)->get();
        }

        if ($depature && $arrival) {
            $get_data = Service::where('depature', $depature)
            ->where('arrival', $arrival)
            ->get();
        }

        if ((!$depature && !$arrival) || (!$arrival && !$depature)) {
            $get_data = Service::all();
        }

        if ($get_data) {
            $services = $get_data;
        } else {
            $services = null;
        }        

        $table_view = view('partials.frontend.table.service_list', compact('services'))->render();        

        $data = array(
            'data' => $services,
            'view' => $table_view
        );        

        echo json_encode($data);
        exit;
    }

    function bookingStatus() {

         // Taking data
         $bookings = Booking::with('service')
         ->where('user_id', Auth::user()->id)
         ->where('status', 'PENDING')
         ->orWhere('status', 'ACCEPTED')
         ->orWhere('status', 'VERIFYING')
         ->orWhere('status', 'CONFIRMED')
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

   function payment(Request $request, $id) {
        $booking = Booking::find($id);
        if ($request->hasFile('payment')) {
            $payment = $request->payment;
            $payment->move('uploads/payments', $payment->getClientOriginalName());
            $booking->payment = $request->payment->getClientOriginalName();
        }

        $booking->update([
            'payment' => $booking->payment,
            'status' => 'VERIFYING'
        ]);

        $request->session()->flash('msg', 'Wait for your payment to verified by Admin');
        return redirect()->back();
   }
}
