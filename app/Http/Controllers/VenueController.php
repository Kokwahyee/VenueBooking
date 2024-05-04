<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VenueController extends Controller
{
    // Show all venues
    public function index()
    {
        return view('venues.index', [
            'venues' => Venue::latest()->filter(request(['search']))->paginate(6)
        ]);
    }

    public function show($id)
    {
        $venue = Venue::findOrFail($id); // Assuming Venue is your model

        return view('venues.show', compact('venue'));
    }


    // Show create form
    public function create()
    {
        return view('venues.create');
    }

    // Store venue data
public function store(Request $request)
{
    $formFields = $request->validate([
        'venue_title' => 'required',
        'venue_description' => 'required',
        'venue_location' => 'required',
        'venue_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Update validation rules for image
    ]);

    $path = null; // Initialize path variable

    if ($request->hasFile('venue_image')) {
        $file = $request->file('venue_image');

        // Generate unique file name
        $filename = time() . '.' . $file->getClientOriginalExtension();

        // Move the file to the specified directory
        $file->move(public_path('uploads/venue'), $filename);

        // Set the path for the saved image
        $path = 'uploads/venue/' . $filename;
    }

    // Create venue with form data and image path
    Venue::create([
        'venue_title' => $formFields['venue_title'],
        'venue_description' => $formFields['venue_description'],
        'venue_location' => $formFields['venue_location'],
        'venue_image' => $path, // Set the image path in the database
    ]);

    return redirect('/venue_manage')->with('message', 'Venue Created Successfully!');
}

    // Show edit form
    public function edit(Venue $venue)
    {
        return view('venues.edit', compact('venue'));
    }

    // Update venue data
    public function update(Request $request, Venue $venue)
    {
        $formFields = $request->validate([
            'venue_title' => 'required',
            'venue_description' => 'required',
            'venue_location' => 'required',
            'venue_image' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        if ($request->hasFile('venue_image')) {
            $file = $request->file('venue_image');

            if ($file->isValid()) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $path = 'uploads/venue/';
                $file->move($path, $filename);

                // Delete old image file
                if (File::exists($venue->venue_image)) {
                    File::delete($venue->venue_image);
                }

                $venue->update([
                    'venue_title' => $formFields['venue_title'],
                    'venue_description' => $formFields['venue_description'],
                    'venue_location' => $formFields['venue_location'],
                    'venue_image' => $path . $filename,
                ]);

                return redirect()->route('venue.manage')->with('message', 'Venue Updated Successfully!');
            } else {
                // Handle invalid file
                return redirect()->back()->withInput()->withErrors(['venue_image' => 'Invalid file uploaded']);
            }
        }

        // Update venue data without changing image
        $venue->update([
            'venue_title' => $formFields['venue_title'],
            'venue_description' => $formFields['venue_description'],
            'venue_location' => $formFields['venue_location'],
        ]);

        return redirect()->route('venue.manage')->with('message', 'Venue Updated Successfully!');
    }

    // Delete venue
    public function destroy(Venue $venue)
    {
        // Delete image file if exists
        if (File::exists($venue->venue_image)) {
            File::delete($venue->venue_image);
        }

        $venue->delete();
        return redirect()->route('venue.manage')->with('message', 'Venue Deleted Successfully!');
    }

    // Manage venues
    public function manage()
    {
        return view('venues.manage', [
            'heading' => 'Latest Venue',
            'venues' => Venue::paginate(10)
        ]);
    }
    
}
