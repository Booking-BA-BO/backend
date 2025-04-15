<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EsemenyController;
use App\Http\Controllers\FoglalasController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RendezController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::('/', [Controller::class, '']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/* Route::get('/', function () {
    return 'API';
});*/

Route::apiResource('posts', PostController::class); 

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


// Esemény táblára vonatkozó végpontok
Route::get('/topevents/{user_id}', [EsemenyController::class, 'getTopUserEvents']);
Route::get('/events', [EsemenyController::class, 'getEvents']);
Route::get('/events/{user_id}', [EsemenyController::class, 'getUsersEvents']);
Route::get('/specific-events/{event_id}', [EsemenyController::class, 'getSpecificEvent']);
Route::get('/reservation/{egyeni_vegpont}', [EsemenyController::class, 'getEventDetails']);
Route::get('/user-data/{egyeni_vegpont}', [EsemenyController::class, 'returnUser']);

Route::patch('/modify-user-data/{user_id}', [EsemenyController::class, 'modifyUserData']);
Route::post('/new-event', [EsemenyController::class, 'postNewEventType']);

// post, patch, delete ++ reservation/{user.egyeni_vegpont}

// Rendez táblára vonatkozó végpontok
Route::get('/all-event-dates/{event_id}', [RendezController::class, 'getSpecEventDates']);

// Foglalas táblára vonatkozó végpontok modifyUserData
Route::get('/', [FoglalasController::class, '']);


//email küldés
Route::post('/contact', [ContactController::class, 'send']);