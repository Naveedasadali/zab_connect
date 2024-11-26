<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('zabconnect');
})->name('home');





Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::get('/events', [EventController::class, 'index'])->name('events');

use App\Models\User;


// Route for displaying the admin login form (GET method)
Route::get('/admin_login', function () {
    return view('admin_login');
})->name('admin_login');


Route::post('/admin_dashboard', function () {
    // Your admin dashboard logic here
    return view('admin_dashboard');
})->name('admin_dashboard');
Route::post('/create-event', function (Request $request) {
    // Validate request data
    $validated = $request->validate([
        'eventName' => 'required|string|max:255',
        'eventDescription' => 'required|string',
        'eventImage' => 'required|image|max:2048',
    ]);

    // Save the image
    $imagePath = $request->file('eventImage')->store('public/events');
    $imageUrl = str_replace('public/', '/storage/', $imagePath);

    // Save the event to the database
    Event::create([
        'name' => $validated['eventName'],
        'description' => $validated['eventDescription'],
        'image' => $imageUrl,
    ]);
    Route::post('/admin_dashboard', [EventController::class, 'store'])->name('admin_dashboard.store');

    return redirect('/admin_dashboard')->with('success', 'Event created successfully!');
})->name('create-event');

Route::get('/events', [EventController::class, 'showEvents'])->name('events');
Route::post('/update-event', function (Request $request) {
    $event = Event::findOrFail($request->id);
    $event->update($request->only(['title', 'description', 'image']));
    return response()->json(['success' => true]);
});
Route::delete('/delete-event', function (Request $request) {
    Event::destroy($request->id);
    return response()->json(['success' => true]);
});

require __DIR__.'/auth.php';
