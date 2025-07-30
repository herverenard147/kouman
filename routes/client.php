<?php

use App\Http\Controllers\Auth\Client\AuthenticatedClientController;
use App\Http\Controllers\Auth\Client\ConfirmablePasswordClientController;
use App\Http\Controllers\Auth\Client\NewPasswordClientController;
use App\Http\Controllers\Auth\Client\PasswordClientController;
use App\Http\Controllers\Auth\Client\PasswordResetLinkClientController;
use App\Http\Controllers\Auth\Client\RegisteredClientController;
use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Client\CheckoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MailContact;

Route::get('/filtrer', [ClientController::class, 'filtrer'])->name('client.filtrer.services');

Route::prefix('filtrer')->group(function () {
    Route::get('/hebergements', [ClientController::class, 'filtrerHebergements'])->name('client.filtre.hebergements');
    Route::get('/vols', [ClientController::class, 'filtrerVols'])->name('client.filtre.vols');
    Route::get('/excursions', [ClientController::class, 'filtrerExcursions'])->name('client.filtre.excursions');
    Route::get('/evenements', [ClientController::class, 'filtrerEvenements'])->name('client.filtre.evenements');
});


Route::get('/', [ClientController::class, 'index'])->name('client.index');

Route::middleware(['guest:web'])->prefix('client')->group(function () {


    Route::get('forgot-password', [PasswordResetLinkClientController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkClientController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordClientController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordClientController::class, 'store'])
        ->name('password.store');


    Route::get('/offres', [PropertyController::class, 'index'])->name('client.grid.sidebar');

    Route::post('/contact/envoyer', [MailContact::class, 'store'])->name('contact.envoyer');


    Route::post('logout', [AuthenticatedClientController::class, 'destroy'])
        ->name('client.logout');

    Route::view('terms', 'client.terms')->name('client.terms');

    Route::get('auth-login', [AuthenticatedClientController::class, 'create'])->name('client.auth.login');
    Route::post('auth-login', [AuthenticatedClientController::class, 'store'])->name('client.auth.login.store');

    Route::get('about-us', function () {
        return view('client.aboutus');
    })->name('client.aboutus');

    Route::get('auth-signup', [RegisteredClientController::class, 'create'])->name('client.auth.signup');
    Route::post('auth-signup', [RegisteredClientController::class, 'store'])->name('client.auth.signup.store');

    Route::get('agencies', function () {
        return view('client.agencies');
    })->name('client.agencies');

    Route::get('agency-profile', function () {
        return view('client.agency-profile');
    })->name('client.agency.profile');


    Route::get('agents', function () {
        return view('client.agents');
    })->name('client.agents');

    Route::get('agent-profile', function () {
        return view('client.agent-profile');
    })->name('client.agent.profile');


    Route::get('auth-re-password', function () {
        return view('client.auth.re-password');
    })->name('client.auth.re.password');

    Route::get('auth-signup', function () {
        return view('client.auth.signup');
    })->name('client.auth.signup');

    Route::get('blog-detail', function () {
        return view('client.blog-detail');
    })->name('client.blog.detail');

    Route::get('blog-sidebar', function () {
        return view('client.blog-sidebar');
    })->name('client.blog.sidebar');

    Route::get('blogs', function () {
        return view('client.blogs');
    })->name('client.blogs');

    Route::get('buy', function () {
        return view('client.buy');
    })->name('client.buy');

    Route::get('comingsoon', function () {
        return view('client.comingsoon');
    })->name('client.comingsoon');

    Route::get('contact', function () {
        return view('client.contact');
    })->name('client.contact');

    Route::get('faqs', function () {
        return view('client.faqs');
    })->name('client.faqs');

    Route::get('features', function () {
        return view('client.features');
    })->name('client.features');


    Route::get('grid-map', function () {
        return view('client.grid-map');
    })->name('client.grid.map');

    Route::get('nosOffres', function () {
        return view('client.grid-sidebar');
    })->name('client.grid.sidebar');

    Route::get('grid', function () {
        return view('client.grid');
    })->name('client.grid');



    Route::get('list-map', function () {
        return view('client.list-map');
    })->name('client.list.map');

    Route::get('list-sidebar', function () {
        return view('client.list-sidebar');
    })->name('client.list.sidebar');

    Route::get('list', function () {
        return view('client.list');
    })->name('client.list');

    Route::get('maintenance', function () {
        return view('client.maintenance');
    })->name('client.maintenance');

    Route::get('pricing', function () {
        return view('client.pricing');
    })->name('client.pricing');

    Route::get('privacy', function () {
        return view('client.privacy');
    })->name('client.privacy');

    Route::get('property-detail-two', function () {
        return view('client.property-detail-two');
    })->name('client.property.detail.two');

    Route::get('property-detail', function () {
        return view('client.property-detail');
    })->name('client.property.detail');

    Route::get('sell', function () {
        return view('client.sell');
    })->name('client.sell');
});

Route::middleware('auth')
    ->group(function () {


        Route::get('confirm-password', [ConfirmablePasswordClientController::class, 'show'])
            ->name('client.password.confirm');

        Route::post('confirm-password', [ConfirmablePasswordClientController::class, 'store']);

        Route::put('password', [PasswordClientController::class, 'update'])->name('client.password.update');
    });

Route::middleware(['auth:client'])->group(function () {
    Route::get('/mon-profil', function () {
        return view('screens.profile-setting');
    })->name('client.profile');
});

Route::middleware(['auth:client'])->group(function () {

    // Edition du profil (formulaire affichage + update infos perso)
    Route::get('/mon-profil', [ClientProfileController::class, 'edit'])->name('client.profile');
    Route::put('/mon-profil', [ClientProfileController::class, 'update'])->name('client.update');

    // Mise à jour mot de passe
    Route::put('/mon-profil/password', [ClientProfileController::class, 'updatePassword'])->name('client.updatePassword');

    // Suppression du compte
    Route::delete('/mon-profil', [ClientProfileController::class, 'destroy'])->name('client.deleteAccount');

    // Acceder au panier du compte
    Route::get('/mon-panier', [CartController::class, 'index'])->name('client.cart.index');

    // Ajouter au panier
    Route::post('/ajouter-au-panier', [CartController::class, 'addToCart'])->name('client.cart.add');
    Route::delete('/panier/remove/{id}', [CartController::class, 'remove'])->name('client.cart.remove');
    Route::put('/panier/update/{id}', [CartController::class, 'update'])->name('client.cart.update');



    // Pour le checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('client.checkout');
    Route::post('/checkout', [CheckoutController::class, 'submit'])->name('client.checkout.submit');




});
