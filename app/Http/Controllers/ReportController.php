<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function showReportForm()
    {
        return view('reports.report');
    }

    public function generateReport(Request $request)
    {
        // Validate the date inputs
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Get the start and end dates from the request
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        // Retrieve the bookings within the specified date range
        $bookings = Booking::whereBetween('date', [$startDate, $endDate])->get();

        // Check if there are any bookings
        if ($bookings->isEmpty()) {
            return redirect()->route('reports.form')->with('error', 'No bookings found for the selected date range.');
        }

        // Get total users and venues
        $totalUsers = User::count();
        $totalVenues = Venue::count();

        // Calculate total revenue per venue
        $venueEarnings = Venue::with(['bookings' => function($query) use ($startDate, $endDate) {
            $query->whereBetween('date', [$startDate, $endDate])
                ->where('status', 'Paid');
        }])->get()->map(function($venue) {
            $venue->total_earnings = $venue->bookings->sum('total_cost');
            return $venue;
        });

        // Pass the bookings data, totals, and venue earnings to the view
        return view('reports.generate', compact('bookings', 'startDate', 'endDate', 'totalUsers', 'totalVenues', 'venueEarnings'));
    }

    public function downloadReport(Request $request)
    {
        // Validate the date inputs
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Get the start and end dates from the request
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        // Retrieve the bookings within the specified date range
        $bookings = Booking::whereBetween('date', [$startDate, $endDate])->get();

        // Check if there are any bookings
        if ($bookings->isEmpty()) {
            return redirect()->route('reports.form')->with('error', 'No bookings found for the selected date range.');
        }

        // Get total users and venues
        $totalUsers = User::count();
        $totalVenues = Venue::count();

        // Calculate total revenue per venue
        $venueEarnings = Venue::with(['bookings' => function($query) use ($startDate, $endDate) {
            $query->whereBetween('date', [$startDate, $endDate])
                ->where('status', 'Paid');
        }])->get()->map(function($venue) {
            $venue->total_earnings = $venue->bookings->sum('total_cost');
            return $venue;
        });

        // Generate the PDF
        $pdf = PDF::loadView('reports.generate', compact('bookings', 'startDate', 'endDate', 'totalUsers', 'totalVenues', 'venueEarnings'));

        // Set the filename
        $filename = 'Report_' . $startDate->format('Ymd') . '_to_' . $endDate->format('Ymd') . '.pdf';

        // Download the PDF
        return $pdf->download($filename);
    }
}
