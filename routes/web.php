<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('get_service_list', [HomeController::class, 'getServiceLists']);

Route::get('admin/admin-login', [AdminController::class, 'index'])->name('admin-login');
Route::post('admin/store-admin-login', [AdminController::class, 'store']);
Route::post('admin/logout', [AdminController::class, 'logout']);

// User Authentication
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/store-login', [AuthController::class, 'storeLogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/user/store-register', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::post('/user/booking-request', [HomeController::class, 'bookingRequest']);
    Route::get('/user/booking', [HomeController::class, 'bookingStatus']);
    Route::get('/user/transaksi', [HomeController::class, 'transaksiStatus']);
    Route::post('user/payment/{id}', [HomeController::class, 'payment']);
});

Route::prefix('admin')->group(function() {
    Route::middleware('admin')->group(function () {
        Route::middleware('dokter')->group(function () {
            // RUD Users
            Route::resource('users', 'App\Http\Controllers\UserController');
    
            // CRUD Services
            Route::resource('services', 'App\Http\Controllers\ServiceController');            
        });
        Route::get('/', [DashboardController::class, 'index']);

        // CRUD Booking
        Route::resource('booking-request', 'App\Http\Controllers\BookingController');

        // CRUD Transactions
        Route::resource('transaction-list', 'App\Http\Controllers\TransactionController');

        // CRUD Jam Operasional
        Route::resource('operationals', 'App\Http\Controllers\JamOperasionalController');
    });
});