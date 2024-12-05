<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use App\Http\Controllers\ParticipantController;

Route::get('/', function () {
    return view('zabconnect');
})->name('home');

Route::get('/view/events', [EventController::class, 'index'])->name('events');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');

/// Apply middleware to the DashboardController routes
Route::middleware('auth')->group(function () {
    // Apply 'auth' middleware to the /dashboard route
    Route::match(['get', 'post'], '/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});









// Route for displaying the admin login form (GET method)
Route::get('/admin_login', function () {
    return view('admin_login');
})->name('admin_login');

// web.php (routes)
Route::match(['get', 'post'], '/admin_dashboard', [AdminController::class, 'adminDashboard'])->name('admin_dashboard');

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


Route::post('/update-event', function (Request $request) {
    $event = Event::findOrFail($request->id);
    $event->update($request->only(['title', 'description', 'image']));
    return response()->json(['success' => true]);
});
Route::delete('/delete-event', function (Request $request) {
    Event::destroy($request->id);
    return response()->json(['success' => true]);
});


// Route to show the participant registration form (GET request)
Route::get('/participants/create', [ParticipantController::class, 'create'])->name('participant.create');

// Route to handle the form submission (POST request)
Route::post('/participants', [ParticipantController::class, 'store'])->name('participants.store');
require __DIR__.'/auth.php';
