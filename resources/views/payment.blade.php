<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Page</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
    
            .main-container {
                display: flex;
                justify-content: center;
                align-items: flex-start;
                margin: 50px auto;
                max-width: 1200px;
                background-color: #fff;
                padding:10px;
            }
    
            .container {
                width: 45%;
                margin: 0 10px;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
    
            h1 {
                text-align: center;
                margin-bottom: 20px;
                font-weight: bold;
                text-decoration:underline;
            }
    
            .form-group {
                margin-bottom: 20px;
            }
    
            label {
                font-weight: bold;
            }
    
            input[type="text"] {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
    
            button[type="submit"] {
                display: block;
                width: 100%;
                padding: 10px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
    
            button[type="submit"]:hover {
                background-color: #0056b3;
            }

            .grid-container {
                display: grid;
                grid-template-columns: auto auto;
                gap: 10px;
                align-items: start;
            }
            .grid-item {
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <div class="main-container">
            <div class="container">
                <h1>Booking Details</h1>
                <div class="booking-details">
                    <div class="grid-container">
                        <div class="grid-item" style="text-align:right;">Booking ID:</div>
                        <div class="grid-item"><span style="font-weight: bold;">#{{ $booking->id }}</span></div>
            
                        <div class="grid-item" style="text-align:right;">Venue:</div>
                        <div class="grid-item"><span style="font-weight: bold;">{{ $booking->venue->venue_title }}</span></div>
            
                        <div class="grid-item" style="text-align:right;">Location:</div>
                        <div class="grid-item"><span style="font-weight: bold;">{{ $booking->venue->venue_location }}</span></div>
            
                        <div class="grid-item" style="text-align:right;">Date:</div>
                        <div class="grid-item"><span style="font-weight: bold;">{{ $booking->date }}</span></div>
            
                        <div class="grid-item" style="text-align:right;">Time Slots:</div>
                        <div class="grid-item">
                            <ul class="list-disc pl-8">
                                @foreach(json_decode($booking->time_slots) as $timeSlot)
                                    <li><span style="font-weight: bold;">{{ $timeSlot }}</span></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="grid-item" style="text-align:right;">Total Price:</div>
                        <div class="grid-item"><span style="font-weight: bold;">${{ $booking->total_cost }}</span></div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h1>Payment Details</h1>
                <form action="{{ route('payment.process', ['id' => $booking->id]) }}" method="POST" id="payment-form">
                    @csrf
                    <div class="form-group">
                        <label for="card_number">Card Number:</label>
                        <input type="text" id="card_number" name="card_number" placeholder="Enter card number" required>
                    </div>
                    <div class="form-group">
                        <label for="expiry_date">Expiry Date:</label>
                        <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YYYY" required>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV:</label>
                        <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" required>
                    </div>
                    <div class="form-group">
                        <label for="cardholder_name">Cardholder Name:</label>
                        <input type="text" id="cardholder_name" name="cardholder_name" placeholder="Enter cardholder name" required>
                    </div>
                    <button type="submit">Pay Now</button>
                </form>
            </div>
        </div>
    
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var stripe = Stripe('{{ env('STRIPE_KEY') }}');
            var elements = stripe.elements();
    
            var card = elements.create('card');
            card.mount('#card-element');
    
            var form = document.getElementById('payment-form');
    
            form.addEventListener('submit', function(event) {
                event.preventDefault();
    
                stripe.confirmCardPayment(clientSecret, {
                    payment_method: {
                        card: card,
                        billing_details: {
                            name: document.getElementById('cardholder_name').value
                        }
                    }
                }).then(function(result) {
                    if (result.error) {
                        // Show error to your customer
                        console.error(result.error.message);
                    } else {
                        // Payment succeeded, redirect to success page
                        window.location.href = '/payment/success';
                    }
                });
            });
        });
    </script>
    
    </body>
    </html>
    </x-app-layout>
    