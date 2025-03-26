<?php

use App\Http\Controllers\SoftwareChargeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('software-charges/paid/history', [SoftwareChargeController::class, 'history']);