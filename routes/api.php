<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EsemenyController;
use App\Http\Controllers\FoglalasController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RendezController;
use App\Models\Rendez;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/endpoint-exists/{endpoint}', [AuthController::class, 'endpointExists']);

Route::middleware('auth:sanctum')->group(function () {
    // User routes
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user-data/{egyeni_vegpont}', [AuthController::class, 'returnUser']);
    Route::patch('/modify-user-data/{user_id}', [AuthController::class, 'modifyUserData']);
    Route::patch('/change-password/{user_id}', [AuthController::class, 'changePassword']);

    // Profile picture routes
    Route::post('/upload-profile-picture', [AuthController::class, 'uploadProfilePicture']);
    Route::delete('/delete-profile-picture', [AuthController::class, 'deleteProfilePicture']);

    // Event routes
    Route::get('/topevents/{user_id}', [EsemenyController::class, 'getTopUserEvents']);
    Route::get('/events', [EsemenyController::class, 'getEvents']);
    Route::get('/all-host-dates/{egyeni_vegpont}', [EsemenyController::class, 'allHostDates']);
    Route::get('/events/{user_id}', [EsemenyController::class, 'getUsersEvents']);
    Route::get('/specific-events/{event_id}', [EsemenyController::class, 'getSpecificEvent']);
    Route::get('/reservation/{egyeni_vegpont}', [EsemenyController::class, 'getEventDetails']);
    Route::patch('/modify-event/{event_id}', [EsemenyController::class, 'modifyEventData']);
    Route::post('/new-event', [EsemenyController::class, 'postNewEventType']);

    // Event host routes
    Route::post('/event-times', [RendezController::class, 'postEventTimes']);
    Route::get('/spec-events-hosts/{event_id}', [RendezController::class, 'getSpecEventDates']);
    Route::get('/all-event-dates/{event_id}', [RendezController::class, 'getAllEventDates']);
    Route::post('/add-event', [RendezController::class, 'storeEventHost']);

    // Booking routes
    Route::get('/', [FoglalasController::class, '']);
});

Route::post('/contact', [ContactController::class, 'send']);
Route::post('/send-email', [MailController::class, 'sendEmail']);
