<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RequestChangeController;
use App\Http\Controllers\RequestCommentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentController;
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

Route::get('/venue/create', [VenueController::class, 'create'])->name('venue.create');
Route::get('/venue_manage', [VenueController::class, 'manage'])->name('venue.manage'); // Changed route definition
Route::post('/venue', [VenueController::class, 'store'])->name('venue.store'); // Store Venue
Route::get('/venue/{venue}', [VenueController::class, 'show'])->name('venue.show');
Route::get('/venue/{venue}/edit', [VenueController::class, 'edit'])->name('venue.edit');
Route::put('/venue/{venue}', [VenueController::class, 'update'])->name('venue.update');
Route::delete('/venue/{venue}', [VenueController::class, 'destroy'])->name('venue.destroy'); // Delete Venue

Route::get('/booking/create/{venue}', [BookingController::class, 'create'])->name('booking.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/getTimeSlots', [BookingController::class, 'getTimeSlots'])->name('bookings.getTimeSlots');
Route::get('/bookings/confirmation/{id}', [BookingController::class, 'confirmation'])->name('bookings.confirmation');
Route::get('/bookings', [BookingController::class, 'index'])->name('booking.index');
Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
Route::patch('/bookings/{id}/status', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus');

Route::middleware(['auth'])->group(function () {
    // Route to display the report form
    Route::get('/reports', [ReportController::class, 'showReportForm'])->name('reports.form');

    // Route to generate the report
    Route::post('/reports/generate', [ReportController::class, 'generateReport'])->name('reports.generate');

    // Route to download the report as PDF
    Route::post('/reports/download', [ReportController::class, 'downloadReport'])->name('reports.download');
});

Route::get('/bookings/{booking}/request-change', [BookingController::class, 'requestChangeForm'])->name('bookings.requestChange');
//Route::post('/bookings/{booking}/request-change', [BookingController::class, 'submitChangeRequest'])->name('bookings.submitChangeRequest');
Route::post('/bookings/{booking}/request-change', [RequestChangeController::class, 'store'])->name('bookings.submitChangeRequest');

Route::post('/venues/{venue}/comments', [CommentController::class, 'store'])->middleware('auth');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit')->middleware('auth');
Route::patch('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update')->middleware('auth');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware('auth');

Route::get('/bookings/{id}/download', [BookingController::class, 'downloadPdf'])->name('bookings.downloadPdf');

Route::middleware('auth')->group(function () {
    Route::get('/request-changes', [RequestChangeController::class, 'index'])->name('request_changes.index');
    Route::get('/request_changes/{id}', [RequestChangeController::class, 'show'])->name('request_changes.show');
    Route::get('/request-changes/{id}/edit', [RequestChangeController::class, 'edit'])->name('request_changes.edit');
    Route::put('/request-changes/{id}', [RequestChangeController::class, 'update'])->name('request_changes.update');
    Route::delete('/request-changes/{id}', [RequestChangeController::class, 'destroy'])->name('request_changes.destroy');
    Route::post('/request_changes/{id}/resolve', [RequestChangeController::class, 'resolve'])->name('request_changes.resolve');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/request_comments/store', [RequestCommentController::class, 'store'])->name('request_comments.store');
});

//Payment Route
Route::middleware('auth')->group(function () {
    Route::get('/transaction', [PaymentController::class, 'index'])->name('transaction');
    Route::get('/booking/{id}/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');   
    Route::post('/booking/{id}/process-payment', [PaymentController::class, 'processPayment'])->name('payment.process');
});

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');