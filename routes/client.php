<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::middleware(['web', 'auth:client'])->prefix('client')->group(function () {
    Route::get('/dashboard', [ClientController::class, 'index'])->name('client.dashboard');
});
