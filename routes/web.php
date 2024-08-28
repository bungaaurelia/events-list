<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\EventTypeController;


// Home route
Route::get('/', function () {
    return view('welcome'); // You can create a 'welcome.blade.php' file for the home page
})->name('home');

// Event routes
Route::prefix('events')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('events.index');
    Route::get('/unpublished', [EventController::class, 'showUnpublished'])->name('events.unpublished');
    Route::get('/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/store', [EventController::class, 'store'])->name('events.store');
    Route::get('/{id}', [EventController::class, 'show'])->name('events.show');
    Route::get('/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/{id}/update', [EventController::class, 'update'])->name('events.update');
    Route::delete('/{id}/del', [EventController::class, 'destroy'])->name('events.destroy');
    Route::patch('/{id}/status', [EventController::class, 'updateStatus'])->name('events.updateStatus');
});

// Organizer routes
Route::prefix('organizers')->group(function () {
    Route::get('/', [OrganizerController::class, 'index'])->name('organizers.index');
    Route::get('/create', [OrganizerController::class, 'create'])->name('organizers.create');
    Route::post('/store', [OrganizerController::class, 'store'])->name('organizers.store');
    Route::get('/{organizer}', [OrganizerController::class, 'show'])->name('organizers.show');
    Route::get('/{organizer}/edit', [OrganizerController::class, 'edit'])->name('organizers.edit');
    Route::put('/{organizer}/update', [OrganizerController::class, 'update'])->name('organizers.update');
    Route::delete('/{organizer}/del', [OrganizerController::class, 'destroy'])->name('organizers.destroy');
});

// Event Type routes
Route::prefix('event-types')->group(function () {
    Route::get('/', [EventTypeController::class, 'index'])->name('event-types.index');
    Route::get('/create', [EventTypeController::class, 'create'])->name('event-types.create');
    Route::post('/store', [EventTypeController::class, 'store'])->name('event-types.store');
    Route::get('/{type}/edit', [EventTypeController::class, 'edit'])->name('event-types.edit');
    Route::put('/{type}/update', [EventTypeController::class, 'update'])->name('event-types.update');
    Route::delete('/{type}/del', [EventTypeController::class, 'destroy'])->name('event-types.destroy');
});