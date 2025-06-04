<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartenaireController;

Route::middleware(['web', 'auth:partenaire'])->prefix('partenaire')->group(function () {
    Route::get('/dashboard', [PartenaireController::class, 'index'])->name('partenaire.dashboard');
});
