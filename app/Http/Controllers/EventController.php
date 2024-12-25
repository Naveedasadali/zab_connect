<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Show the form to create an event
   // EventController.php
   public function index()
{
    // If you need to pass a list of events to the create view
    $events = Event::all();  // Retrieve all events, if needed
    return view('events', compact('events'));  // Pass events to the view
}

public function create()
{
    // If you need to pass a list of events to the create view
    $events = Event::all();  // Retrieve all events, if needed
    return view('event_manges.create', compact('events'));  // Pass events to the view
}

    // Store a new event
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'event_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $event = new Event;
        $event->name = $validatedData['name'];
        $event->description = $validatedData['description'];

        if ($request->hasFile('event_image')) {
            $event->image = $request->file('event_image')->store('events','public');
        }

        $event->save();

        return redirect()->route('events.create')->with('success', 'Event created successfully!');
    }

    // Show the form to update an event
    public function showUpdateForm($id)
    {
        $event = Event::findOrFail($id);
        return view('event_manges.update', compact('event')); // View for updating event
    }

    // Update an existing event
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'event_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $event = Event::findOrFail($id);
        $event->name = $validatedData['name'];
        $event->description = $validatedData['description'];

        if ($request->hasFile('event_image')) {
            $event->image = $request->file('event_image')->store('events','public');
        }

        $event->save();

        return redirect()->route('dashboard')->with('success', 'Event updated successfully!');
    }

    // Delete an event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('dashboard')->with('success', 'Event deleted successfully!');
 
    }
    // Add this method to your EventController
// In EventController.php
public function search(Request $request)
{
    $query = $request->get('query');
    
    // Fetch events that match the search query in either name or description
    $events = Event::where('name', 'LIKE', '%' . $query . '%')
        ->orWhere('description', 'LIKE', '%' . $query . '%')
        ->get();
    
    // Return the search results as JSON or render a partial view
    return response()->json([
        'events' => $events
    ]);
}


}
