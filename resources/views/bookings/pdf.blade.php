<!DOCTYPE html>
<html>
<head>
  <title>Booking Confirmation</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 20px;
    }

    /* Center all content divs */
    .content,
    .header,
    .details {
      margin: 0 auto;
      max-width: 700px;
      text-align: center; /* Center text within these divs */
    }

    .header {
      margin-bottom: 40px;
    }

    .details p {
      margin: 5px 0;
    }

    /* Make "Venue Booking" bold and underlined */
    .header h1 {
      font-weight: bold;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="content">
    <div class="header">
      <h1>Venue Booking</h1>
    </div>
    <div class="details">
      <p>Your booking has been confirmed!</p>
      <p>Booking ID: #<strong>{{ $booking->id }}</strong></p>
      <p><b>Venue:</b> <strong>{{ $booking->venue->venue_title }}</strong></p>
      <p>Description: <strong>{{ $booking->venue->venue_description }}</strong></p>
      <p>Location: <strong>{{ $booking->venue->venue_location }}</strong></p>
      <p>Date: <strong>{{ $booking->date }}</strong></p>
      <p>Time Slots:</p>
      <ul>
        @foreach(json_decode($booking->time_slots) as $timeSlot)
          <li>{{ $timeSlot }}</li>
        @endforeach
      </ul>
      <br>
      <p>Status: <strong>{{ $booking->status }}</strong></p>
      <br>
      <p>Booked by: <strong>{{ $booking->user->email }}</strong></p>
      <p>Total Price: <strong>${{ $booking->total_cost }}</strong></p>
      <br>
      @if (in_array($booking->status, ['Pending', 'Cancelled']))
        <p class="text-xl font-semibold mb-2">Note: If you wish to pay in cash then pay at our nearest office</p>
      @endif
      <br>
    </div>
  </div>
</body>
</html>
