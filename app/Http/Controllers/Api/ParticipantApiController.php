<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ParticipantService;
use Illuminate\Http\Request;

class ParticipantApiController extends Controller
{
    protected $participantService;

    public function __construct(ParticipantService $participantService)
    {
        $this->participantService = $participantService;
    }

    public function store(Request $request)
    {
        $participant = $this->participantService->storeParticipant($request);
        return response()->json($participant, 201);
    }

    public function index()
    {
        return response()->json($this->participantService->getAllParticipants(), 200);
    }

    public function show($id)
    {
        $participant = $this->participantService->getParticipant($id);
        return response()->json($participant, 200);
    }

    public function destroy($id)
    {
        $participant = $this->participantService->deleteParticipant($id);
        return response()->json(['message' => 'Participant deleted successfully'], 200);
    }
}
