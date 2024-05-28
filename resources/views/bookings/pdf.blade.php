<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }
        .content {
            margin: 0 auto;
            max-width: 700px;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="header">
            <h2>Booking Confirmation</h2>
        </div>
        <div class="details">
            <p>Your booking has been confirmed!</p>
            <p>Venue: <strong>{{ $booking->venue->venue_title }}</strong></p>
            <p>Description: <strong>{{ $booking->venue->venue_description }}</strong></p>
            <p>Location: <strong>{{ $booking->venue->venue_location }}</strong></p>
            <p>Date: <strong>{{ $booking->date }}</strong></p>
            <p>Time Slots:</p>
            <ul>
                @foreach(json_decode($booking->time_slots) as $timeSlot)
                    <li>{{ $timeSlot }}</li>
                @endforeach
            </ul>
            <p>Booked by: <strong>{{ $booking->user->email }}</strong></p>
            <p>Total Price: <strong>${{ $booking->total_cost }}</strong></p>
            <br>
            <p>Please pay at our nearest office.</p>
        </div>
    </div>
</body>
</html>
