<?php



namespace App\Http\Controllers;

use App\Models\Event; // Import the Event model
use App\Models\Participant; // Import the Participant model
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    // Show the participant registration form
    public function create()
    {
        // Get all events to display in the registration form
        $events = Event::all();

        // Pass the events to the view
        return view('participant_create', compact('events'));
    }

    // Store the participant data
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email',
            'event_id' => 'required|exists:events,id',
        ]);

        // Store the participant data
        Participant::create([
            'name' => $request->name,
            'email' => $request->email,
            'event_id' => $request->event_id,
        ]);

        // Redirect with a success message
        return redirect()->route('participant.create')->with('success', 'You have registered successfully!');
    }
}


