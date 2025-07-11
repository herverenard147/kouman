<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\AuthenticatedPartenaireController;
use App\Http\Controllers\Excursion\ExcursionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisteredPartenaireController;
use App\Http\Controllers\Hebergement\HebergementController;
use App\Http\Controllers\Hebergement\TypeHebergementController;

// Route::middleware( [ 'auth:partenaire'])
//     ->prefix('partenaire')
//     ->group(function () {
//         Route::get('/login', fn() => view('screens.login'))->name('login');
//        Route::get('registerPart', [RegisteredPartenaireController::class, 'create'])
//             ->name('registerPart');
//         Route::post('registerPart', [RegisteredPartenaireController::class, 'store'])
//         ->name('registerPartStore');
// });

Route::middleware('guest:partenaire')->prefix('partenaire')->group(function () {
    Route::get('login', [AuthenticatedPartenaireController::class, 'create'])->name('partenaire.login');
    Route::post('login', [AuthenticatedPartenaireController::class, 'store'])->name('partenaire.login.store');

    Route::get('forgot-password', [PasswordResetLinkControllerPartenaire::class, 'create'])->name('partenaire.reset-password');
    Route::post('forgot-password', [PasswordResetLinkControllerPartenaire::class, 'store'])->name('partenaire.reset-password.store');

    Route::get('reset-password/{token}', [NewPasswordControllerPartenaire::class, 'create'])
        ->name('partenaire.password.reset');
    // Traitement du nouveau mot de passe (POST)
    Route::post('reset-password', [NewPasswordControllerPartenaire::class, 'store'])
    ->name('partenaire.password.update');
    Route::get('terms', fn() => view('screens.terms'))->name('partenaire.terms');

    Route::get('/register', [RegisteredPartenaireController::class, 'create'])->name( 'partenaire.register.index');
    Route::post('/register', [RegisteredPartenaireController::class, 'store'])->name('partenaire.register.store');

});


Route::middleware(['auth:partenaire'])
    ->prefix( 'partenaire')
    ->group(function () {
        Route::get('/', [PartenaireController::class, 'index'])->name('partenaire.dashboard');
        Route::get('chat', fn() => view('screens.chat'))->name('partenaire.chat');
        Route::get('blog', fn() => view('screens.blog'))->name('partenaire.blog');
        Route::get('blog-detail', fn() => view('screens.blog-detail'))->name('partenaire.blog-detail');
        Route::get('favorite-hebergement', fn() => view('screens.favorite-property'))->name('partenaire.favorite-hebergement');
        Route::get('error', fn() => view('screens.error'))->name('partenaire.error');
        Route::get('comingsoon', fn() => view('screens.comingsoon'))->name('partenaire.comingsoon');
        Route::get('lock-screen', fn() => view('screens.lock-screen'))->name('partenaire.lock-screen');
        Route::get('maintenance', fn() => view('screens.maintenance'))->name('partenaire.maintenance');
        Route::get('pricing', fn() => view('screens.pricing'))->name('partenaire.pricing');
        Route::get('faqs', fn() => view('screens.faqs'))->name('partenaire.faqs');
        Route::get('profile', fn() => view('screens.profile'))->name('partenaire.profile');
        Route::get('profile-setting', fn() => view('screens.profile-setting'))->name('partenaire.profile-setting');
        Route::get('privacy', fn() => view('screens.privacy'))->name('partenaire.privacy');
        // Route::get('signup', fn() => view('screens.signup'))->name('signup');
        Route::get('signup-success', fn() => view('screens.signup-success'))->name('partenaire.signup-success');
        Route::get('starter', fn() => view('screens.starter'))->name('partenaire.starter');
        Route::get('thankyou', fn() => view('screens.thankyou'))->name('partenaire.thankyou');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

        Route::group(['prefix' => 'hebergement'], function(){

            Route::get('/', [HebergementController::class, 'index'])->name('partenaire.hebergement');
            Route::get('detail/{id}', [HebergementController::class, 'show'])->name('partenaire.hebergement-detail.show');

            Route::get('update/{id}', [HebergementController::class, 'edit'])->name('partenaire.hebergement-detail.edit');
            Route::put('update/{id}', [HebergementController::class, 'update'])->name('partenaire.hebergement-detail.update');
            Route::delete('delette/{id}', [HebergementController::class, 'destroy'])->name('partenaire.hebergement.destroy');
            // Route::delete('images-hebergement/{id}', [ImageHebergementController::class, 'destroy']);
        });

        Route::group(['prefix' => 'excursion'], function(){

            Route::get('/', [HebergementController::class, 'index'])->name('partenaire.excursion');
            Route::get('detail/{id}', [HebergementController::class, 'show'])->name('partenaire.excursion-detail.show');

            Route::get('update/{id}', [HebergementController::class, 'edit'])->name('partenaire.excursion-detail.edit');
            Route::put('update/{id}', [HebergementController::class, 'update'])->name('partenaire.excursion-detail.update');
            Route::delete('delette/{id}', [HebergementController::class, 'destroy'])->name('partenaire.excursion.destroy');
            // Route::delete('images-hebergement/{id}', [ImageHebergementController::class, 'destroy']);
        });

        Route::group(['prefix' => 'evenement'], function(){

            Route::get('/', [HebergementController::class, 'index'])->name('partenaire.evenement');
            Route::get('detail/{id}', [HebergementController::class, 'show'])->name('partenaire.evenement-detail.show');

            Route::get('update/{id}', [HebergementController::class, 'edit'])->name('partenaire.evenement-detail.edit');
            Route::put('update/{id}', [HebergementController::class, 'update'])->name('partenaire.evenement-detail.update');
            Route::delete('delette/{id}', [HebergementController::class, 'destroy'])->name('partenaire.evenement.destroy');
            // Route::delete('images-hebergement/{id}', [ImageHebergementController::class, 'destroy']);
        });

        Route::get('review', fn() => view('screens.review'))->name('partenaire.review');

        Route::group(['prefix' => 'add'], function () {
            Route::get('event', fn() => view('screens.add.evenement.evenement-add'))->name('partenaire.add.event');
            Route::get('excursion', [ExcursionController::class, 'createExcursion'])->name('partenaire.add.excursion');
            Route::get('hebergement', [HebergementController::class, 'create'])->name('partenaire.add.hebergement');
            Route::get('vol', fn() => view('screens.add.vol'))->name('partenaire.add.vol');
            Route::get('/types-par-famille/{idFamille}', [TypeHebergementController::class, 'getTypesByFamille']);

            Route::post('hebergement', [HebergementController::class, 'store'])->name('partenaire.add.hebergement.store');

        });
        Route::get('/popup-localisation', function () {
            return view('popup.localisation');
        })->name('popup.localisation');
        Route::get('/localisation-popup', function () {
            return view('popup.localisation-popup'); // le fichier où se trouve ton script
        })->name('partenaire.localisation.popup');
});
