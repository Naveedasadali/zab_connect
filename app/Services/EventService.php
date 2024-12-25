<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Http\Request;

class EventService
{
    public function getAllEvents()
    {
        return Event::all();
    }

    public function getEvent($id)
    {
        return Event::findOrFail($id);
    }

    public function storeEvent(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'event_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $event = Event::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'image' => $request->file('event_image')->store('events', 'public'),
        ]);

        return $event;
    }

    public function updateEvent(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'event_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $event = Event::findOrFail($id);
        $event->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'image' => $request->hasFile('event_image') 
                        ? $request->file('event_image')->store('events', 'public')
                        : $event->image,
        ]);

        return $event;
    }

    public function deleteEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return $event;
    }

    public function searchEvents(Request $request)
    {
        $query = $request->get('query');
        return Event::where('name', 'LIKE', '%' . $query . '%')
                    ->orWhere('description', 'LIKE', '%' . $query . '%')
                    ->get();
    }
}
