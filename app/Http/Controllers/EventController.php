<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller

{
    public function index()
    {
        $events = Event::all();
        return view('events', compact('events'));
    }
    // Store method for creating events
    public function store(Request $request)
    {
        // Validate incoming data using the injected Request object
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'event_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle event creation after validation
        $event = new Event;
        $event->name = $validatedData['name'];
        $event->description = $validatedData['description'];

        // Handle image upload
        if ($request->hasFile('event_image')) {
            $event->image = $request->file('event_image')->store('public/events');
        }

        $event->save();

        return redirect()->route('events')->with('success', 'Event created successfully!');
    }
    public function searchEvents(Request $request)
    {
        // Get the search query from the request
        $query = $request->get('query');
        
        // Validate the input (optional)
        $validated = $request->validate([
            'query' => 'required|string|max:255',
        ]);
        
        // Perform the search (basic search by title, you can adjust for more fields)
        $events = Event::where('title', 'LIKE', '%' . $query . '%')
                       ->orWhere('description', 'LIKE', '%' . $query . '%') // You can also search by description or other fields
                       ->get();
                       dd($events);
        // Return a JSON response with the events
        return response()->json([
            'events' => $events
        ]);
    }

}