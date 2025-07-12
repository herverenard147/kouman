<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
// middleware(['web', 'auth:client'])->
// Route::prefix('client')->prefix('client')->group(function () {
//     Route::get('/dashboard', [ClientController::class, 'index'])->name('client.dashboard');
//     Route::view('/', 'client.index-two')->name('home');
//     Route::view('/index-two', 'client.index-two')->name('index.two');
//     Route::view('/index-three', 'client.index-three')->name('index.three');
//     Route::view('/index-four', 'client.index-four')->name('index.four');
//     Route::view('/index-five', 'client.index-five')->name('index.five');
//     Route::view('/index-six', 'client.index-six')->name('index.six');
//     Route::view('/index-seven', 'client.index-seven')->name('index.seven');
//     Route::view('/index-eight', 'client.index-eight')->name('index.eight');
//     Route::view('/index-nine', 'client.index-nine')->name('index.nine');
//     Route::view('/index-ten', 'client.index-ten')->name('index.ten');

//     Route::view('/buy', 'client.buy')->name('buy');
//     Route::view('/sell', 'client.sell')->name('sell');

//     // Listing
//     Route::view('/grid', 'client.grid')->name('listing.grid');
//     Route::view('/grid-sidebar', 'client.grid-sidebar')->name('listing.grid.sidebar');
//     Route::view('/grid-map', 'client.grid-map')->name('listing.grid.map');

//     Route::view('/list', 'client.list')->name('listing.list');
//     Route::view('/list-sidebar', 'client.list-sidebar')->name('listing.list.sidebar');
//     Route::view('/list-map', 'client.list-map')->name('listing.list.map');

//     Route::view('/property-detail', 'client.property-detail')->name('listing.detail');
//     Route::view('/property-detail-two', 'client.property-detail-two')->name('listing.detail.two');

//     // Pages
//     Route::view('/about-us', 'client.aboutus')->name('about');
//     Route::view('/features', 'client.features')->name('features');
//     Route::view('/pricing', 'client.pricing')->name('pricing');
//     Route::view('/faqs', 'client.faqs')->name('faqs');

//     Route::view('/agents', 'client.agents')->name('agents');
//     Route::view('/agent-profile', 'client.agent-profile')->name('agent.profile');
//     Route::view('/agencies', 'client.agencies')->name('agencies');
//     Route::view('/agency-profile', 'client.agency-profile')->name('agency.profile');

//     // Auth
//     // Route::view('/login', 'client.auth-login')->name('login');
//     Route::view('/signup', 'client.auth-signup')->name('signup');
//     Route::view('/reset-password', 'client.auth-re-password')->name('password.reset');

//     // Utility
//     Route::view('/terms', 'client.terms')->name('terms');
//     Route::view('/privacy', 'client.privacy')->name('privacy');

//     // Blog
//     Route::view('/blogs', 'client.blogs')->name('blogs');
//     Route::view('/blog-sidebar', 'client.blog-sidebar')->name('blog.sidebar');
//     Route::view('/blog-detail', 'client.blog-detail')->name('blog.detail');

//     // Special
//     Route::view('/comingsoon', 'client.comingsoon')->name('comingsoon');
//     Route::view('/maintenance', 'client.maintenance')->name('maintenance');
//     Route::view('/404', 'client.404')->name('error.404');

//     // Contact
//     Route::view('/contact', 'client.contact')->name('contact');
// });

// Route::prefix('client')->group(function () {



// });
