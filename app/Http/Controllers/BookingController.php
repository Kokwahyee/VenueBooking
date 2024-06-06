<?php

namespace App\Http\Controllers;

use PDF;
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
            $bookings = Booking::orderBy('created_at', 'desc')->paginate(10);
        } else {
            // Non-admin users can only view their own bookings
            $bookings = Booking::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        return view('bookings.show', compact('booking'));
    }

    public function requestChangeForm($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.request-change', compact('booking'));
    }

    public function submitChangeRequest(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $request->validate([
            'type' => 'required|string|in:refund,change',
            'reason' => 'required|string',
        ]);


        return redirect()->route('bookings.index')->with('success', 'Your request has been submitted.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Paid,Cancelled',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->input('status');
        $booking->save();

        return redirect()->route('bookings.show', $booking->id)->with('status', 'Booking status updated successfully.');
    }

    public function create(Request $request, Venue $venue)
    {
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
        ];

        $bookedTimeSlots = Booking::where('venue_id', $venue->id)
            ->whereDate('date', $request->date)
            ->whereIn('status', ['Pending', 'Paid'])
            ->pluck('time_slots')
            ->flatten()
            ->toArray();

        return view('bookings.create', compact('venue', 'timeSlots', 'bookedTimeSlots'));
    }

    public function getTimeSlots(Request $request)
    {
        $bookedTimeSlots = Booking::where('venue_id', $request->venue_id)
            ->whereDate('date', $request->date)
            ->whereIn('status', ['Pending', 'Paid'])
            ->pluck('time_slots')
            ->flatten()
            ->toArray();

        \Log::info($bookedTimeSlots);

        return response()->json($bookedTimeSlots);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'venue_id' => 'required|exists:venues,id',
            'time' => 'required|array|min:1',
            'time.*' => 'string',
            'total_cost' => 'required|numeric|min:0',
        ]);

        $timeSlots = json_encode($request->input('time'));

        $booking = new Booking();
        $booking->fill($validatedData);
        $booking->venue_id = $request->venue_id;
        $booking->date = $request->date;
        $booking->time_slots = $timeSlots;
        $booking->user_id = auth()->id();
        $booking->total_cost = $request->total_cost;

        $booking->save();

        return redirect()->route('bookings.confirmation', ['id' => $booking->id]);
    }

    public function confirmation($id)
    {
        $booking = Booking::findOrFail($id);

        return view('bookings.confirmation', compact('booking'));
    }

    public function downloadPdf($id)
    {
        $booking = Booking::findOrFail($id);
    
        $pdf = PDF::loadView('bookings.pdf', compact('booking'));
    
        $filename = 'BookingConfirmation_' . now()->format('YmdHis') . '.pdf';
    
        return $pdf->download($filename);
    }
}
