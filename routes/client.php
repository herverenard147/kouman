<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::prefix('client')->group(function () {
    Route::get('/dashboard', [ClientController::class, 'index'])->name('client.dashboard');
    Route::view('/', 'client.index-two')->name('home');
    Route::view('/index-two', 'client.index-two')->name('index.two');
    Route::view('/index-three', 'client.index-three')->name('index.three');
    Route::view('/index-four', 'client.index-four')->name('index.four');
    Route::view('/index-five', 'client.index-five')->name('index.five');
    Route::view('/index-six', 'client.index-six')->name('index.six');
    Route::view('/index-seven', 'client.index-seven')->name('index.seven');
    Route::view('/index-eight', 'client.index-eight')->name('index.eight');
    Route::view('/index-nine', 'client.index-nine')->name('index.nine');
    Route::view('/index-ten', 'client.index-ten')->name('index.ten');

    Route::view('/buy', 'client.buy')->name('buy');
    Route::view('/sell', 'client.sell')->name('sell');

    // Listing
    Route::view('/grid', 'client.grid')->name('listing.grid');
    Route::view('/grid-sidebar', 'client.grid-sidebar')->name('listing.grid.sidebar');
    Route::view('/grid-map', 'client.grid-map')->name('listing.grid.map');

    Route::view('/list', 'client.list')->name('listing.list');
    Route::view('/list-sidebar', 'client.list-sidebar')->name('listing.list.sidebar');
    Route::view('/list-map', 'client.list-map')->name('listing.list.map');

    Route::view('/property-detail', 'client.property-detail')->name('listing.detail');
    Route::view('/property-detail-two', 'client.property-detail-two')->name('listing.detail.two');

    // Pages
    Route::view('/about-us', 'client.aboutus')->name('about');
    Route::view('/features', 'client.features')->name('features');
    Route::view('/pricing', 'client.pricing')->name('pricing');
    Route::view('/faqs', 'client.faqs')->name('faqs');

    Route::view('/agents', 'client.agents')->name('agents');
    Route::view('/agent-profile', 'client.agent-profile')->name('agent.profile');
    Route::view('/agencies', 'client.agencies')->name('agencies');
    Route::view('/agency-profile', 'client.agency-profile')->name('agency.profile');

    // Auth
    // Route::view('/login', 'client.auth-login')->name('login');
    Route::view('/signup', 'client.auth-signup')->name('signup');
    Route::view('/reset-password', 'client.auth-re-password')->name('password.reset');

    // Utility
    Route::view('/terms', 'client.terms')->name('terms');
    Route::view('/privacy', 'client.privacy')->name('privacy');

    // Blog
    Route::view('/blogs', 'client.blogs')->name('blogs');
    Route::view('/blog-sidebar', 'client.blog-sidebar')->name('blog.sidebar');
    Route::view('/blog-detail', 'client.blog-detail')->name('blog.detail');

    // Special
    Route::view('/comingsoon', 'client.comingsoon')->name('comingsoon');
    Route::view('/maintenance', 'client.maintenance')->name('maintenance');
    Route::view('/404', 'client.404')->name('error.404');

    // Contact
    Route::view('/contact', 'client.contact')->name('contact');
});

Route::get('/client/error', function () {
    return view('client.404');
})->name('client.error.404');

Route::get('/client/auth-login', function () {
    return view('client.auth-login');
})->name('client.auth.login');

Route::get('/client/about-us', function () {
    return view('client.aboutus');
})->name('client.aboutus');

Route::get('/client/auth-signup', function () {
    return view('client.auth-signup');
})->name('client.auth.signup');

Route::get('/client/agencies', function () {
    return view('client.agencies');
})->name('client.agencies');
    
Route::get('/client/agency-profile', function () {
    return view('client.agency-profile');
})->name('client.agency.profile');


Route::get('/client/agents', function () {
    return view('client.agents');
})->name('client.agents');

Route::get('/client/auth-login', function () {
    return view('client.auth-login');
})->name('client.auth.login');

Route::get('/client/auth-re-password', function () {
    return view('client.auth-re-password');
})->name('client.auth.re.password');

Route::get('/client/auth-signup', function () {
    return view('client.auth-signup');
})->name('client.auth.signup');

Route::get('/client/blog-detail', function () {
    return view('client.blog-detail');
})->name('client.blog.detail');

Route::get('/client/blog-sidebar', function () {
    return view('client.blog-sidebar');
})->name('client.blog.sidebar');

Route::get('/client/blogs', function () {
    return view('client.blogs');
})->name('client.blogs');

Route::get('/client/buy', function () {
    return view('client.buy');
})->name('client.buy');

Route::get('/client/comingsoon', function () {
    return view('client.comingsoon');
})->name('client.comingsoon');

Route::get('/client/contact', function () {
    return view('client.contact');
})->name('client.contact');

Route::get('/client/faqs', function () {
    return view('client.faqs');
})->name('client.faqs');

Route::get('/client/features', function () {
    return view('client.features');
})->name('client.features');


Route::get('/client/grid-map', function () {
    return view('client.grid-map');
})->name('client.grid-map');

Route::get('/client/grid-sidebar', function () {
    return view('client.grid-sidebar');
})->name('client.grid-sidebar');

Route::get('/client/grid', function () {
    return view('client.grid');
})->name('client.grid');

Route::get('/client/index-eight', function () {
    return view('client.index-eight');
})->name('client.index-eight');

Route::get('/client/index-five', function () {
    return view('client.index-five');
})->name('client.index-five');

Route::get('/client/index-four', function () {
    return view('client.index-four');
})->name('client.index-four');

Route::get('/client/index-nine', function () {
    return view('client.index-nine');
})->name('client.index-nine');

Route::get('/client/index-seven', function () {
    return view('client.index-seven');
})->name('client.index-seven');


Route::get('/client/index-six', function () {
    return view('client.index-six');
})->name('client.index-six');

Route::get('/client/index-ten', function () {
    return view('client.index-ten');
})->name('client.index-ten');

Route::get('/client/index-three', function () {
    return view('client.index-three');
})->name('client.index-three');

Route::get('/client/index-two', function () {
    return view('client.index-two');
})->name('client.index-two');

Route::get('/client/index', function () {
    return view('client.index');
})->name('client.index');

Route::get('/client/list-map', function () {
    return view('client.list-map');
})->name('client.list-map');

Route::get('/client/list-sidebar', function () {
    return view('client.list-sidebar');
})->name('client.list-sidebar');

Route::get('/client/list', function () {
    return view('client.list');
})->name('client.list');

Route::get('/client/maintenance', function () {
    return view('client.maintenance');
})->name('client.maintenance');

Route::get('/client/pricing', function () {
    return view('client.pricing');
})->name('client.pricing');

Route::get('/client/privacy', function () {
    return view('client.privacy');
})->name('client.privacy');

Route::get('/client/property-detail-two', function () {
    return view('client.property-detail-two');
})->name('client.property-detail');

Route::get('/client/property-detail', function () {
    return view('client.property-detail');
})->name('client.property-detail');

Route::get('/client/sell', function () {
    return view('client.sell');
})->name('client.sell');

Route::get('/client/terms', function () {
    return view('client.terms');
})->name('client.terms');
