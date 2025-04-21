<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RoomsController, FacilitiesController, ReservationsController, ReceptionistController, AdminController, AuthController, LocationController, GoogleController};

Route::get('/', fn()=>view('home'))->name('home');

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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/rooms/{type}', [RoomsController::class, 'show'])->name('rooms.show_tamu');
    Route::get('/rooms', [RoomsController::class, 'guestIndex'])->name('rooms.rooms');
});
