<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;

class TransactionController extends Controller
{
    function index() {
        // Taking data
        $transactions = Booking::with('service')
        ->where('status', 'DONE')        
        ->get();

        $dokter['dokter'] = User::where('role_id', 3)->first();
        $data = $dokter;        

        // Directing to template with data
        return view('admin.transaction.index', $data, compact('transactions'));
    }
}
