<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use Illuminate\Http\Request;

class EventApiController extends Controller
{
    protected $eventService;

    // Inject the EventService class
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    // Get all events
    public function index()
    {
        return response()->json($this->eventService->getAllEvents(), 200);
    }

    // Store a new event
    public function store(Request $request)
    {
        $event = $this->eventService->storeEvent($request);
        return response()->json($event, 201);
    }

    // Show a specific event
    public function show($id)
    {
        $event = $this->eventService->getEvent($id);
        return response()->json($event, 200);
    }

    // Update an existing event
    public function update(Request $request, $id)
    {
        $event = $this->eventService->updateEvent($request, $id);
        return response()->json($event, 200);
    }

    // Delete an event
    public function destroy($id)
    {
        $this->eventService->deleteEvent($id);
        return response()->json(['message' => 'Event deleted successfully'], 200);
    }

    // Search for events by query
    public function search(Request $request)
    {
        $events = $this->eventService->searchEvents($request);
        return response()->json($events, 200);
    }
}