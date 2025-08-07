<?php

use App\Http\Controllers\Auth\Client\AuthenticatedClientController;
use App\Http\Controllers\Auth\Client\ConfirmablePasswordClientController;
use App\Http\Controllers\Auth\Client\NewPasswordClientController;
use App\Http\Controllers\Auth\Client\PasswordClientController;
use App\Http\Controllers\Auth\Client\PasswordResetLinkClientController;
use App\Http\Controllers\Auth\Client\RegisteredClientController;
use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Client\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailContact;

/*
|--------------------------------------------------------------------------
| Routes publiques (filtrage, accueil)
|--------------------------------------------------------------------------
*/

Route::get('/filtrer', [ClientController::class, 'filtrer'])->name('client.filtrer.services');

Route::prefix('filtrer')->group(function () {
    Route::get('/hebergements', [ClientController::class, 'filtrerHebergements'])->name('client.filtre.hebergements');
    Route::get('/vols', [ClientController::class, 'filtrerVols'])->name('client.filtre.vols');
    Route::get('/excursions', [ClientController::class, 'filtrerExcursions'])->name('client.filtre.excursions');
    Route::get('/evenements', [ClientController::class, 'filtrerEvenements'])->name('client.filtre.evenements');
});

Route::get('/', [ClientController::class, 'index'])->name('client.index');

/*
|--------------------------------------------------------------------------
| Espace "client" (pages publiques sans auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['guest:web'])->prefix('client')->group(function () {
    // Auth invité
    Route::get('forgot-password', [PasswordResetLinkClientController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkClientController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordClientController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordClientController::class, 'store'])->name('password.store');

    Route::post('/contact/envoyer', [MailContact::class, 'store'])->name('contact.envoyer');

    Route::post('logout', [AuthenticatedClientController::class, 'destroy'])->name('client.logout');

    Route::view('terms', 'client.terms')->name('client.terms');

    Route::get('auth-login', [AuthenticatedClientController::class, 'create'])->name('client.auth.login');
    Route::post('auth-login', [AuthenticatedClientController::class, 'store'])->name('client.auth.login.store');

    Route::get('auth-signup', [RegisteredClientController::class, 'create'])->name('client.auth.signup');
    Route::post('auth-signup', [RegisteredClientController::class, 'store'])->name('client.auth.signup.store');

    // Pages vitrines
    Route::get('about-us', fn () => view('client.aboutus'))->name('client.aboutus');
    Route::get('agencies', [PartenaireController::class, 'publicIndex'])->name('client.agencies');
    Route::get('agency-profile', fn () => view('client.agency-profile'))->name('client.agency.profile');

    Route::get('agents', fn () => view('client.agents'))->name('client.agents');
    Route::get('agent-profile', fn () => view('client.agent-profile'))->name('client.agent.profile');

    Route::get('auth-re-password', fn () => view('client.auth.re-password'))->name('client.auth.re.password');

    Route::get('blog-detail', fn () => view('client.blog-detail'))->name('client.blog.detail');
    Route::get('blog-sidebar', fn () => view('client.blog-sidebar'))->name('client.blog.sidebar');
    Route::get('blogs', fn () => view('client.blogs'))->name('client.blogs');

    Route::get('buy', fn () => view('client.buy'))->name('client.buy');
    Route::get('comingsoon', fn () => view('client.comingsoon'))->name('client.comingsoon');
    Route::get('contact', fn () => view('client.contact'))->name('client.contact');
    Route::get('faqs', fn () => view('client.faqs'))->name('client.faqs');
    Route::get('features', fn () => view('client.features'))->name('client.features');

    Route::get('grid-map', fn () => view('client.grid-map'))->name('client.grid.map');
    Route::get('grid', fn () => view('client.grid'))->name('client.grid');
    Route::get('list-map', fn () => view('client.list-map'))->name('client.list.map');
    Route::get('list-sidebar', fn () => view('client.list-sidebar'))->name('client.list.sidebar');
    Route::get('list', fn () => view('client.list'))->name('client.list');
    Route::get('maintenance', fn () => view('client.maintenance'))->name('client.maintenance');
    Route::get('pricing', fn () => view('client.pricing'))->name('client.pricing');
    Route::get('privacy', fn () => view('client.privacy'))->name('client.privacy');
    Route::get('sell', fn () => view('client.sell'))->name('client.sell');

    // ⚠️ Supprimé : routes statiques conflictuelles
    // Route::get('nosOffres', fn () => view('client.grid-sidebar'))->name('client.grid.sidebar');
    // Route::get('property-detail-two', fn () => view('client.property-detail-two'))->name('client.property.detail.two');
});

/*
|--------------------------------------------------------------------------
| Auth générique (pour mot de passe)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('confirm-password', [ConfirmablePasswordClientController::class, 'show'])->name('client.password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordClientController::class, 'store']);
    Route::put('password', [PasswordClientController::class, 'update'])->name('client.password.update');
});

/*
|--------------------------------------------------------------------------
| Espace "client" authentifié (profil, panier, checkout)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:client'])->group(function () {
    // Profil (version contrôleur uniquement)
    Route::get('/mon-profil', [ClientProfileController::class, 'edit'])->name('client.profile');
    Route::put('/mon-profil', [ClientProfileController::class, 'update'])->name('client.update');
    Route::put('/mon-profil/password', [ClientProfileController::class, 'updatePassword'])->name('client.updatePassword');
    Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');
    Route::delete('/profile/photo', [ProfileController::class, 'deletePhoto'])->name('profile.deletePhoto');
    Route::delete('/mon-profil', [ClientProfileController::class, 'destroy'])->name('client.deleteAccount');

    // Panier
    Route::get('/mon-panier', [CartController::class, 'index'])->name('client.cart.index');
    Route::post('/ajouter-au-panier', [CartController::class, 'addToCart'])->name('client.cart.add');
    Route::delete('/panier/remove/{id}', [CartController::class, 'remove'])->name('client.cart.remove');
    Route::put('/panier/update/{id}', [CartController::class, 'update'])->name('client.cart.update');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('client.checkout');
    Route::post('/checkout', [CheckoutController::class, 'submit'])->name('client.checkout.submit');
    Route::get('/checkout/confirmation', [CheckoutController::class, 'confirmation'])->name('client.checkout.confirmation');
});

/*
|--------------------------------------------------------------------------
| OFFRES (publique) + DÉTAIL dynamique (publique)
|--------------------------------------------------------------------------
*/

// Liste / filtres (publique) -> contrôleur
Route::get('/offres', [PropertyController::class, 'index'])->name('client.grid.sidebar');

// Détail dynamique : on passe categorie + id (publique)
Route::get('/offre/{categorie}/{id}', [PropertyController::class, 'show'])
    ->where([
        'categorie' => 'hebergement|vol|excursion|evenement',
        'id'        => '[0-9]+',
    ])
    ->name('client.property.detail.two');
