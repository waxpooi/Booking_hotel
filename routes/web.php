<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RoomsController, FacilitiesController, ReservationsController, ReceptionistController, AdminController, AuthController, LocationController, GoogleController};

Route::get('/', fn() => view('home'))->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->name('register.post');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('email/verify', function () {
    return view('auth.verify');
})->middleware(['auth', 'signed'])->name('verification.notice');

Route::get('email/verify/{id}/{hash}', [\App\Http\Controllers\Auth\VerifiedController::class, 'verify'])
    ->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/facilities', [FacilitiesController::class, 'GuestIndex'])->name('facilities');

Route::middleware(['auth'])->group(function () {
    Route::get('/rooms/{type}', [RoomsController::class, 'show'])->name('rooms.show_tamu');
    Route::get('/rooms', [RoomsController::class, 'guestIndex'])->name('rooms.rooms');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/reservation/success', [ReservationsController::class, 'success'])->name('reservation.success');
    Route::get('/reservation/{id}', [ReservationsController::class, 'show'])->name('reservation.show');
    Route::get('/reservation', [ReservationsController::class, 'index'])->name('reservation.index');
    Route::post('/reservation', [ReservationsController::class, 'store'])->name('reservation.store');
    Route::post('/reservation/{id}/payment', [ReservationsController::class, 'updatePayment'])->name('reservation.payment');
});

Route::resource('location', LocationController::class);

Route::middleware(['admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/facilities', [FacilitiesController::class, 'index'])->name('facilities.index');
    Route::get('/facilities/create', [FacilitiesController::class, 'create'])->name('facilities.crud');
    Route::post('/facilities', [FacilitiesController::class, 'store'])->name('facilities.store');

    Route::resource('/rooms', RoomsController::class)->except(['show']);
    Route::get('/rooms', [RoomsController::class, 'index'])->name('rooms.index');

    Route::get('/reservations/search', [ReceptionistController::class, 'searchByName'])->name('search');
});

Route::middleware(['role.receptionist'])
    ->prefix('receptionist')
    ->as('receptionist.')
    ->group(function () {
        Route::get('/dashboard', [ReceptionistController::class, 'dashboard'])->name('dashboard');
        Route::get('/reservations', [ReceptionistController::class, 'index'])->name('reservations');
        Route::get('/reservations/filter', [ReceptionistController::class, 'filterByDate'])->name('reservations.filter');
        Route::get('/reservations/search', [ReceptionistController::class, 'searchByEmail'])->name('reservations.search');
        Route::patch('/reservations/{id}/accept', [ReceptionistController::class, 'acceptReservation'])->name('reservations.accept');
        Route::delete('/reservations/{id}/reject', [ReceptionistController::class, 'rejectReservation'])->name('reservations.reject');
    });
