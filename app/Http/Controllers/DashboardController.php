<?php

namespace App\Http\Controllers;
use Illuminate\Http\profileController;
use App\Models\Event;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;




class DashboardController extends Controller
{

    public function index(Request $request)
    {
        // Fetch all events from the database
        $events = Event::all();

        if ($request->isMethod('post')) {
            // Handle POST logic here if needed
        }

        // Pass the $events variable to the view
        return view('dashboard', compact('events'));
    }
}
