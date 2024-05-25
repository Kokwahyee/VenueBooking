<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Venue;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            // Admin can view all booking records, ordered by latest
            $bookings = Booking::orderBy('created_at', 'desc')->paginate(10); // Adjust the number as per your requirement
        } else {
            // Non-admin users can only view their own bookings
            $bookings = Booking::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        }

        // Pass the paginated booking records to the view for display
        return view('bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        // Retrieve the booking details by ID
        $booking = Booking::findOrFail($id);

        // Render the show page with the booking details
        return view('bookings.show', compact('booking'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|in:Pending,Paid,Cancelled',
        ]);

        // Retrieve the booking
        $booking = Booking::findOrFail($id);

        // Update the status
        $booking->status = $request->input('status');
        $booking->save();

        // Redirect back to the booking details page with a success message
        return redirect()->route('bookings.show', $booking->id)->with('status', 'Booking status updated successfully.');
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

        // Retrieve booked time slots for the selected venue on the selected date
        $bookedTimeSlots = Booking::where('venue_id', $venue->id)
                                    ->whereDate('date', $request->date)
                                    ->whereIn('status', ['Pending', 'Paid'])
                                    ->pluck('time_slots')
                                    ->flatten()
                                    ->toArray();

        // Pass the venue object, time slots, and booked time slots to the booking form view
        return view('bookings.create', compact('venue', 'timeSlots', 'bookedTimeSlots'));
    }

    public function getTimeSlots(Request $request)
{
    // Retrieve booked time slots for the selected date
    $bookedTimeSlots = Booking::where('venue_id', $request->venue_id)
                                ->whereDate('date', $request->date)
                                ->whereIn('status', ['Pending', 'Paid'])
                                ->pluck('time_slots')
                                ->flatten()
                                ->toArray();
    
    // Log the booked time slots
    \Log::info($bookedTimeSlots);

    return response()->json($bookedTimeSlots);
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