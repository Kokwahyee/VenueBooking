<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Venue;

class BookingController extends Controller
{
    public function index()
    {
        // Paginate the booking records from the database
        $bookings = Booking::paginate(10); // Adjust the number as per your requirement

        // Pass the paginated booking records to the view for display
        return view('bookings.index', compact('bookings'));
    }

    public function create(Request $request, Venue $venue)
    {
        // Define the available time slots
        $timeSlots = [
            '08:00 AM',
            '09:00 AM',
            '10:00 AM',
            '11:00 AM',
            '12:00 PM',
            '01:00 PM',
            '02:00 PM',
            '03:00 PM',
            '04:00 PM',
            '05:00 PM',
            '06:00 PM',
            '07:00 PM',
            '08:00 PM',
            '09:00 PM',
            // Add more time slots as needed
        ];

        // Pass the venue object and time slots to the booking form view
        return view('bookings.create', compact('venue', 'timeSlots'));
    }

   // Method to store a new booking
public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'date' => 'required', // Ensure that the date field is required
        // Define your other validation rules here
    ]);

    // Ensure the 'time' field is provided in the request
    if (!$request->has('time')) {
        // Handle the case where no time slots are selected
        // You can customize this based on your application logic
        return redirect()->back()->with('error', 'Please select at least one time slot.');
    }

    // Encode the selected time slots as JSON
    $timeSlots = json_encode($request->input('time'));

    // Create a new booking instance and fill it with validated data
    $booking = new Booking();
    $booking->fill($validatedData);
    $booking->venue_id = $request->venue_id;
    // Assign the date from the request
    $booking->date = $request->date;
    // Assign the time slots
    $booking->time_slots = $timeSlots;
    // Assign the user ID from the authenticated user
    $booking->user_id = auth()->id();

    // Save the booking to the database
    $booking->save();

    // Redirect the user to the confirmation page with the booking ID
    return redirect()->route('bookings.confirmation', ['id' => $booking->id]);
}

// Method to display the booking confirmation page
public function confirmation($id)
{
    // Retrieve the booking details by ID
    $booking = Booking::findOrFail($id);

    // Render the confirmation page with the booking details
    return view('bookings.confirmation', compact('booking'));
}

}
