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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user-data/{egyeni_vegpont}', [AuthController::class, 'returnUser']);
    Route::patch('/modify-user-data/{user_id}', [AuthController::class, 'modifyUserData']);
    Route::patch('/change-password/{user_id}', [AuthController::class, 'changePassword']);

    // Esemény táblára vonatkozó végpontok 
    Route::get('/topevents/{user_id}', [EsemenyController::class, 'getTopUserEvents']);
    Route::get('/events', [EsemenyController::class, 'getEvents']);
    Route::get('/all-host-dates/{egyeni_vegpont}', [EsemenyController::class, 'allHostDates']);
    Route::get('/events/{user_id}', [EsemenyController::class, 'getUsersEvents']);
    Route::get('/specific-events/{event_id}', [EsemenyController::class, 'getSpecificEvent']);
    Route::get('/reservation/{egyeni_vegpont}', [EsemenyController::class, 'getEventDetails']);
    Route::patch('/modify-event/{event_id}', [EsemenyController::class, 'modifyEventData']);
    Route::post('/new-event', [EsemenyController::class, 'postNewEventType']);

    // Rendez táblára vonatkozó végpontok
    Route::post('/event-times', [RendezController::class, 'postEventTimes']);
    Route::get('/spec-events-hosts/{event_id}', [RendezController::class, 'getAllEventDates']);
    Route::get('/all-event-dates/{event_id}', [RendezController::class, 'getSpecEventDates']);
    Route::post('/add-event', [RendezController::class, 'storeEventHost']);

    // Foglalas táblára vonatkozó végpontok 
    Route::get('/', [FoglalasController::class, '']);
});


Route::post('/contact', [ContactController::class, 'send']);
Route::post('/send-email', [MailController::class, 'sendEmail']);