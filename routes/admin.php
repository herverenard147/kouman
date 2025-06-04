<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministrateurController;


Route::middleware(['web', 'auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdministrateurController::class, 'index'])->name('admin.dashboard');
});
