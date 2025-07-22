<?php

use App\Http\Controllers\Auth\AuthenticatedClientController;
use App\Http\Controllers\Auth\RegisteredClientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::get('/', [ClientController::class, 'index'])->name('client.index');

Route::get('/filtrer', [ClientController::class, 'filtrer'])->name('client.filtrer.services');

Route::prefix('filtrer')->group( function(){
    Route::get('/hebergements',[ClientController::class, 'filtrerHebergements'])->name('client.filtre.hebergements');
    Route::get('/vols', [ClientController::class, 'filtrerVols'])->name('client.filtre.vols');
    Route::get('/excursions', [ClientController::class, 'filtrerExcursions'])->name('client.filtre.excursions');
    Route::get('/evenements', [ClientController::class, 'filtrerEvenements'])->name('client.filtre.evenements');
});


Route::middleware(['guest:web'])->prefix('client')->group(function () {

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
