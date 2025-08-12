<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\Auth\Admin\AuthenticatedAdminController;
use App\Http\Controllers\Auth\Client\NewPasswordAdminController;
use App\Http\Controllers\Auth\Client\PasswordResetLinkAdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\PartnerController;

/*
|--------------------------------------------------------------------------
| Routes sécurisées après connexion admin
|--------------------------------------------------------------------------
*/
Route::middleware(['web', 'auth:admin'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdministrateurController::class, 'index'])->name('admin.dashboard');
    
    // Logout
    Route::post('/logout', [AuthenticatedAdminController::class, 'destroy'])->name('admin.logout');

    // CRUD Clients
    Route::resource('clients', ClientController::class)->names([
        'index' => 'admin.clients.index',
        'create' => 'admin.clients.create',
        'store' => 'admin.clients.store',
        'show' => 'admin.clients.show',
        'edit' => 'admin.clients.edit',
        'update' => 'admin.clients.update',
        'destroy' => 'admin.clients.destroy',
    ]);

    // CRUD Partenaires
    Route::resource('partners', PartnerController::class)->names([
        'index' => 'admin.partners.index',
        'create' => 'admin.partners.create',
        'store' => 'admin.partners.store',
        'show' => 'admin.partners.show',
        'edit' => 'admin.partners.edit',
        'update' => 'admin.partners.update',
        'destroy' => 'admin.partners.destroy',
    ]);

    // Activités (dernieres actions)
    Route::get('activities', [AdministrateurController::class, 'activities'])->name('admin.activities.index');
});

/*
|--------------------------------------------------------------------------
| Routes pour l’authentification admin
| URL d’accès volontairement non évidente
|--------------------------------------------------------------------------
*/
$secretAdminPath = 'panelAdmin';

Route::middleware(['guest:web'])->prefix($secretAdminPath)->group(function () {
    Route::get('/login', [AuthenticatedAdminController::class, 'create'])->name('admin.auth.login');
    Route::post('/login', [AuthenticatedAdminController::class, 'store'])->name('admin.auth.login.store');

    Route::get('/forgot-password', [PasswordResetLinkAdminController::class, 'create'])->name('admin.password.request');
    Route::post('/forgot-password', [PasswordResetLinkAdminController::class, 'sendResetLinkEmail'])->name('admin.password.email');

    Route::get('/reset-password/{token}', [NewPasswordAdminController::class, 'create'])->name('admin.password.reset');
    Route::post('/reset-password', [NewPasswordAdminController::class, 'store'])->name('admin.password.store');
});
