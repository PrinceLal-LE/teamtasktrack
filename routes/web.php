<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportTicketController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home.page');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/support', [SupportTicketController::class, 'index']);
    Route::post('/support', [SupportTicketController::class, 'store']);
});

