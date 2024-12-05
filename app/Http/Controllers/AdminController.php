<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class AdminController extends Controller
{
    public function adminDashboard(Request $request)
    {
        // If the request is POST, handle form submissions or data processing here
        if ($request->isMethod('post')) {
            // Handle form submissions or other POST actions here
            // For example, if you're handling event creation or updates
        }

        // Fetch all events from the database for display
        $events = Event::all();

        // Pass events to the view
        return view('admin_dashboard', compact('events'));
    }
}
