<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\BookingController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->get('/venue', [VenueController::class, 'index'])
    ->name('venue');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->get('/venue/manage', [VenueController::class, 'manage'])
    ->name('venue_manage');

Route::get('/venue/create', [VenueController::class, 'create'])->name('venue.create');
Route::post('/venue', [VenueController::class, 'store'])->name('venue.store'); // Store Venue

Route::get('/venue/{venue}/edit', [VenueController::class, 'edit'])->name('venue.edit');
Route::put('/venue/{venue}', [VenueController::class, 'update'])->name('venue.update');
Route::delete('/venue/{venue}', [VenueController::class, 'destroy'])->name('venue.destroy'); // Delete Venue

Route::get('/booking/create/{venue}', [BookingController::class, 'create'])->name('booking.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/getTimeSlots', [BookingController::class, 'getTimeSlots'])->name('bookings.getTimeSlots');
Route::get('/bookings/confirmation/{id}', [BookingController::class, 'confirmation'])->name('bookings.confirmation');
Route::get('/bookings', [BookingController::class, 'index'])->name('booking.index');

