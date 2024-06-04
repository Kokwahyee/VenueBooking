<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment');
    }

    public function processPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        // Create a PaymentIntent
        $paymentIntent = PaymentIntent::create([
            'amount' => 1000, // amount in cents
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]);

        // Store payment details in the database
        Payment::create([
            'user_id' => auth()->id(), // Assuming the user is authenticated
            'payment_intent_id' => $paymentIntent->id,
            'amount' => 1000,
            'currency' => 'usd',
            'status' => $paymentIntent->status,
        ]);

        return response()->json(['client_secret' => $paymentIntent->client_secret]);
    }
}
