<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EventApiController;
use App\Http\Controllers\API\ParticipantApiController;
use App\Http\Controllers\Api\AuthController;
Route::post('login', [AuthController::class, 'login']);

// Protected route
Route::middleware('auth:api')->group(function () {
    // Other protected routes can go here
    Route::get('/profile', function (Request $request) {
        return response()->json([
            'user' => $request->user(),
        ]);
    });

    // Logout route (revoke the access token)
    Route::post('/logout', [AuthController::class, 'logout']);

// API routes for event management
Route::prefix('events')->group(function() {
    // Get all events
    Route::get('/', [EventApiController::class, 'index']);
    
    // Store new event
    Route::post('/', [EventApiController::class, 'store']);
    
    // Get a specific event by ID
    Route::get('/{id}', [EventApiController::class, 'show']);
    
    // Update event
    Route::put('/{id}', [EventApiController::class, 'update']);
    
    // Delete event
    Route::delete('/{id}', [EventApiController::class, 'destroy']);
    
    // Search events by name or description
    Route::get('/search', [EventApiController::class, 'search']);
});

// API routes for participants (if applicable)
Route::prefix('participants')->group(function() {
    // Get all participants
    Route::get('/', [ParticipantApiController::class, 'index']);
    
    // Store new participant
    Route::post('/', [ParticipantApiController::class, 'store']);
    
    // Get a specific participant
    Route::get('/{id}', [ParticipantApiController::class, 'show']);
    
    // Update participant
    Route::put('/{id}', [ParticipantApiController::class, 'update']);
    
    // Delete participant
    Route::delete('/{id}', [ParticipantApiController::class, 'destroy']);
});
});