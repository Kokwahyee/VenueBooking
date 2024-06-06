<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            // Admin can view all booking records, ordered by latest
            $payments = Payment::orderBy('created_at', 'desc')->paginate(10);
        } else {
            // Non-admin users can only view their own bookings
            $payments = Payment::where('id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('transaction', compact('payments'));
    }
    public function showPaymentForm($id)
    {
        $booking = Booking::findOrFail($id);
        return view('payment', compact('booking'));
    }

    public function processPayment(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        // Create a PaymentIntent
        $paymentIntent = PaymentIntent::create([
            'amount' => $booking->total_cost * 100, // amount in cents
            'currency' => 'fjd',
            'payment_method_types' => ['card'],
            'metadata' => ['booking_id' => $booking->id],
        ]);

        // Store payment details in the database
        $payment = Payment::create([
            'user_id' => auth()->id(), // Assuming the user is authenticated
            'booking_id'=> $booking->id,
            'payment_intent_id' => $paymentIntent->id,
            'amount' => $booking->total_cost,
            'currency' => 'fjd',
            'status' => $paymentIntent->status,
        ]);

        // Check if the payment was successfully stored in the database
        if ($payment) {
            // Update the booking status to 'Paid'
            $booking->status = 'Paid';
            $booking->save();
        }

        // Redirect to the booking show page
        return redirect()->route('bookings.confirmation', ['id' => $booking->id]);
    }
}
