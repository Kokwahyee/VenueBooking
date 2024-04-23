<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
   
    //show all venues
   // public function index()
    //{
     //   return view('venues.index', [
      //      'heading' => 'Latest Venue',
       //     'venues' => Venue::paginate(6)
        //]);        
        
    //}

    public function index() {
        return view('venues.index', [
            'venues' => Venue::latest()->filter(request(['search']))->paginate(6)
        ]);
    }


    //show single Venues
    public function show(Venue $venue){
        return view('venues.show', [
            'venue' => $venue
        ]);
    }

    //show create form
    public function create(){
        return view('venues.create');
    }


    //store Venues data
    public function store(Request $request) {
        
        $formFields = $request->validate([
            'venue_title'=>'required',
            'venue_description'=>'required',
            'venue_location'=>'required'
        ]);

        Venue::create($formFields);

        return redirect('/venue_manage')->with('message', 'Venue Created Successfully!');
    }
    
    //Show Edit form
    public function edit(Venue $venue) {
        return view('venues.edit', compact('venue'));
    }

    //update Venues data
    public function update(Request $request, Venue $venue) {
        $venue->update($request->all());
    
        return redirect('/venue_manage')->with('message', 'Venue Updated Successfully');
    }
    
    //Delete Venues
    public function destroy(Venue $venue) {
        $venue->delete();
        return redirect('/venue_manage')->with('message','Venues Deleted Successfully');
    }

    // Manage Venues
    public function manage() {
        return view('venues.manage', [
            'heading' => 'Latest Venue',
            'venues' => Venue::paginate(10)
        ]); 
    }
}
