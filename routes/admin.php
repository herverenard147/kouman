<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\Auth\Admin\AuthenticatedAdminController;
use App\Http\Controllers\Auth\Client\NewPasswordAdminController;
use App\Http\Controllers\Auth\Client\PasswordResetLinkAdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;

/*
|--------------------------------------------------------------------------
| Routes sécurisées après connexion admin
|--------------------------------------------------------------------------
*/

Route::middleware(['web', 'auth:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Logout
        Route::post('/logout', [AuthenticatedAdminController::class, 'destroy'])
            ->name('logout');

        // CRUD Clients
        Route::resource('clients', ClientController::class);

        // CRUD Partenaires
        Route::resource('partners', PartnerController::class);

        // Activités récentes
        Route::get('activities', [AdministrateurController::class, 'activities'])
            ->name('activities.index');

         Route::get('clients/{id}/orders', [ClientController::class, 'orders'])->name('clients.orders');
         Route::get('partners/{id}/orders', [PartnerController::class, 'orders'])->name('partners.orders');
         Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    });

/*
|--------------------------------------------------------------------------
| Routes pour l’authentification admin
| URL volontairement non évidente
|--------------------------------------------------------------------------
*/
$secretAdminPath = 'panelAdmin-492f93a9';

Route::middleware(['guest:web'])
    ->prefix($secretAdminPath)
    ->name('admin.')
    ->group(function () {
        // Login
        Route::get('/login', [AuthenticatedAdminController::class, 'create'])
            ->name('auth.login');
        Route::post('/login', [AuthenticatedAdminController::class, 'store'])
            ->name('auth.login.store');

        // Mot de passe oublié
        Route::get('/forgot-password', [PasswordResetLinkAdminController::class, 'create'])
            ->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkAdminController::class, 'sendResetLinkEmail'])
            ->name('password.email');

        // Réinitialisation du mot de passe
        Route::get('/reset-password/{token}', [NewPasswordAdminController::class, 'create'])
            ->name('password.reset');
        Route::post('/reset-password', [NewPasswordAdminController::class, 'store'])
            ->name('password.store');
    });
