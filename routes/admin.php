<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\Auth\Client\AuthenticatedAdminController;
use App\Http\Controllers\Auth\Client\NewPasswordAdminController;
use App\Http\Controllers\Auth\Client\PasswordResetLinkAdminController;

Route::middleware(['web', 'auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdministrateurController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['guest:web'])->prefix('admin')->group(function () {
    // Auth invité
    Route::get('forgot-password', [PasswordResetLinkAdminController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkAdminController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordAdminController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordAdminController::class, 'store'])->name('password.store');

    Route::post('logout', [AuthenticatedAdminController::class, 'destroy'])->name('admin.logout');

    Route::get('auth-login', [AuthenticatedAdminController::class, 'create'])->name('admin.auth.login');
    Route::post('auth-login', [AuthenticatedAdminController::class, 'store'])->name('admin.auth.login.store');
});
