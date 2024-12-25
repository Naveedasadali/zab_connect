<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use App\Http\Controllers\ParticipantController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/view/events', [EventController::class, 'index'])->name('events');

// In routes/web.php
Route::get('/events/search', [EventController::class, 'search'])->name('events.search');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');

/// Apply middleware to the DashboardController routes
Route::middleware('auth')->group(function () {
    // Apply 'auth' middleware to the /dashboard route
    Route::match(['get', 'post'], '/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});



// In routes/web.php
Route::get('/search-events', [EventController::class, 'searchEvents'])->name('search.events');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});







// Show the form to create an event (GET method)
Route::post('/events-create', [EventController::class, 'create'])->name('events.create');
Route::get('/events-create', [EventController::class, 'create'])->name('events.create');

// Store a new event (POST method)
Route::post('/view/events', [EventController::class, 'store'])->name('events.store');

// Show the form to update an event (GET method)
Route::get('/events/{id}/update', [EventController::class, 'showUpdateForm'])->name('events.updateForm');

// Update an event (POST method)
Route::post('/events/{id}/update', [EventController::class, 'update'])->name('events.update');

// Delete an event (POST method, as you typically use POST to submit delete requests in forms)

// Update an event (POST method)
Route::post('/events/{id}/update', [EventController::class, 'update'])->name('events.update');
// In routes/web.php
Route::post('/events/{id}/prioritize', [EventController::class, 'prioritize'])->name('events.prioritize');

Route::post('/events/{id}/delete', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/events/{id}/delete', [EventController::class, 'destroy'])->name('events.destroy');
Route::delete('/events/{id}/delete', [EventController::class, 'destroy'])->name('events.destroy');

// Route for displaying the admin login form (GET method)
Route::get('/admin_login', function () {
    return view('admin_login');
})->name('admin_login');

// web.php (routes)
Route::match(['get', 'post'], '/admin_dashboard', [AdminController::class, 'adminDashboard'])->name('admin_dashboard');




// Route to show the participant registration form (GET request)
Route::get('/participants/create', [ParticipantController::class, 'create'])->name('participant.create');

// Route to handle the form submission (POST request)
Route::post('/participants', [ParticipantController::class, 'store'])->name('participants.store');
require __DIR__.'/auth.php';
