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
   
}
