<?php

use App\Http\Controllers\SoftwareChargeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn () => Inertia::render('Welcome'))->name('home');

Route::get('software-charges/payment/{month}/{amount}/{website?}', [SoftwareChargeController::class, 'payment'])
    ->name('software-charges.payment');

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', fn () => Inertia::render('Dashboard'))->name('dashboard');

    Route::get('/software-charges', [SoftwareChargeController::class, 'index'])
        ->name('software-charges.index');

    Route::get('/software-charges/paid/history/{website}', [SoftwareChargeController::class, 'history'])
        ->name('software-charges.client.history');
});

// Settings and auth routes
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
