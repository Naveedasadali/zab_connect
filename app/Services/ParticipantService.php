<?php
namespace App\Services;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantService
{
    // Store participant data
    public function storeParticipant(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email',
            'event_id' => 'required|exists:events,id',
        ]);

        return Participant::create([
            'name' => $request->name,
            'email' => $request->email,
            'event_id' => $request->event_id,
        ]);
    }

    // Get all participants
    public function getAllParticipants()
    {
        return Participant::all();
    }

    // Get a specific participant
    public function getParticipant($id)
    {
        return Participant::findOrFail($id);
    }

    // Delete participant
    public function deleteParticipant($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();
        return $participant;
    }
}
