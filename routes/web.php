<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\{RoomsController, FacilitiesController, ReservationsController, ReceptionistController, AdminController, AuthController, LocationController, TiketController};

Route::get('/', fn() => view('home'))->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->name('register.post');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/email/verify', [\App\Http\Controllers\Auth\VerifiedController::class, 'showVerificationNotice'])
    ->middleware('auth')
    ->name('auth.verified');

Route::get('/email/verify/{id}/{hash}', [\App\Http\Controllers\Auth\VerifiedController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('success', 'Email verifikasi telah dikirim ulang!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/facilities', [FacilitiesController::class, 'GuestIndex'])->name('facilities');

Route::middleware(['auth'])->group(function () {
    Route::get('/rooms/{type}', [RoomsController::class, 'show'])->name('rooms.show_tamu');
    Route::get('/rooms', [RoomsController::class, 'guestIndex'])->name('rooms.rooms');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/reservation/create/{room_id}', [ReservationsController::class, 'create'])->name('reservation.create');
    Route::get('/reservation/success', [ReservationsController::class, 'success'])->name('reservation.success');
    Route::get('/reservation/{id}', [ReservationsController::class, 'show'])->name('reservation.show');
    Route::get('/reservation', [ReservationsController::class, 'index'])->name('reservation.index');
    Route::post('/reservation', [ReservationsController::class, 'store'])->name('reservation.store');
    Route::post('/reservation/{id}/payment', [ReservationsController::class, 'updatePayment'])->name('reservation.payment');
    Route::get('/reservations/{id}/download', [ReservationsController::class, 'download'])->name('reservations.download');

});

Route::get('/tiket', [TiketController::class, 'index'])->name('tiket');
Route::get('/tiket/{id}', [TiketController::class, 'show'])->name('tiket.detail');

Route::resource('location', LocationController::class);

Route::middleware(['admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::resource('/facilities', FacilitiesController::class)->except(['show']);

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
        Route::patch('/reservations/{id}/cancelled', [ReceptionistController::class, 'cancelledReservation'])->name('reservations.cancelled');
    });
