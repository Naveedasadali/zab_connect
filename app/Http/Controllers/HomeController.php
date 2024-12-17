<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Event; 

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all events from the database
        $events = Event::all();

        // Return the view and pass the events to it
        return view('zabconnect', compact('events'));
    }
    public function searchEvents(Request $request)
    {
        $query = $request->input('query');

        // Fetch events that match the query
        $events = Event::where('title', 'LIKE', '%' . $query . '%')
                       ->orWhere('description', 'LIKE', '%' . $query . '%')
                       ->get();
    dd($events);
        // Return the filtered events as JSON
        return response()->json([
            'events' => $events
        ]);
    }
}
