<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
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

        // Check the status of the PaymentIntent
        if ($paymentIntent->status == 'succeeded') {
            // Update the booking status to 'Paid'
            $booking->status = 'Paid';
            $booking->save();
        }

        return response()->json(['client_secret' => $paymentIntent->client_secret]);
    }
}
