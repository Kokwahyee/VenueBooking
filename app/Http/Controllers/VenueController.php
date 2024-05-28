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
        $venue = Venue::findOrFail($id);

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
            'venue_price' => 'required|numeric|min:0',
            'venue_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = null;

        if ($request->hasFile('venue_image')) {
            $file = $request->file('venue_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/venue'), $filename);
            $path = 'uploads/venue/' . $filename;
        }

        Venue::create([
            'venue_title' => $formFields['venue_title'],
            'venue_description' => $formFields['venue_description'],
            'venue_location' => $formFields['venue_location'],
            'venue_price' => $formFields['venue_price'],
            'venue_image' => $path,
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
            'venue_price' => 'required|numeric|min:0',
            'venue_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $venue->venue_image;

        if ($request->hasFile('venue_image')) {
            $file = $request->file('venue_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/venue'), $filename);
            $path = 'uploads/venue/' . $filename;

            if (File::exists($venue->venue_image)) {
                File::delete($venue->venue_image);
            }
        }

        $venue->update([
            'venue_title' => $formFields['venue_title'],
            'venue_description' => $formFields['venue_description'],
            'venue_location' => $formFields['venue_location'],
            'venue_price' => $formFields['venue_price'],
            'venue_image' => $path,
        ]);

        return redirect()->route('venue.manage')->with('message', 'Venue Updated Successfully!');
    }

    // Delete venue
    public function destroy(Venue $venue)
    {
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
