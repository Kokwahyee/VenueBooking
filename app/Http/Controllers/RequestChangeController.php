<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\RequestChange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RequestChangeController extends Controller
{
    public function store(Request $request, $bookingId)
    {
        $formFields = $request->validate([
            'type' => 'required|string|in:refund,change',
            'reason' => 'required|string',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Update validation rules for image
        ]);

        $booking = Booking::findOrFail($bookingId);
        $filePath = null; // Initialize filePath variable

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Generate unique file name
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Move the file to the specified directory
            $file->move(public_path('uploads/request'), $filename);

            // Set the path for the saved image
            $filePath = 'uploads/request/' . $filename;
        }

        // Create request change with form data and file path
        RequestChange::create([
            'booking_id' => $booking->id,
            'type' => $formFields['type'],
            'reason' => $formFields['reason'],
            'file_path' => $filePath, // Set the file path in the database
            'request_status' => 'Pending',
        ]);

        return redirect()->route('request_changes.index')->with('success', 'Your request has been submitted.');
    }

    public function index()
    {
        $requests = RequestChange::with('booking')->get();
        return view('request_changes.index', compact('requests'));
    }

    public function show($id)
    {
        $requestChange = RequestChange::findOrFail($id);
        return view('request_changes.show', compact('requestChange'));
    }

    public function edit($id)
    {
        $requestChange = RequestChange::findOrFail($id);
        return view('request_changes.edit', compact('requestChange'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|in:refund,change',
            'reason' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $requestChange = RequestChange::findOrFail($id);

        $filePath = $requestChange->file_path;
        if ($request->hasFile('file')) {
            if ($filePath) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file')->store('request_changes', 'public');
        }

        $requestChange->update([
            'type' => $request->type,
            'reason' => $request->reason,
            'file_path' => $filePath,
        ]);

        return redirect()->route('request_changes.index')->with('success', 'Request updated successfully.');
    }

    public function destroy($id)
    {
        $requestChange = RequestChange::findOrFail($id);

        // Ensure only the user who submitted the request can delete it
        if (auth()->user()->id !== $requestChange->booking->user_id) {
            abort(403, 'Unauthorized action.');
        }

        if ($requestChange->file_path) {
            Storage::disk('public')->delete($requestChange->file_path);
        }

        $requestChange->delete();

        return redirect()->route('request_changes.index')->with('success', 'Request deleted successfully.');
    }

    public function resolve(Request $request, $id)
    {
        $requestChange = RequestChange::findOrFail($id);
        // Update the request status to "Resolved"
        $requestChange->update(['request_status' => 'Resolved']);

        return redirect()->back()->with('success', 'Request resolved successfully.');
    }
}