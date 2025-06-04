<?php

use Illuminate\Support\Facades\Route;

use function Pest\Laravel\get;

Route::get('/', function () {
    return view ('screens.index');
})->name('index');


Route::get('login', fn() => view('screens.login'))->name('login');
Route::get('chat', fn() => view('screens.chat'))->name('chat');
Route::get('blog', fn() => view('screens.blog'))->name('blog');
Route::get('blog-detail', fn() => view('screens.blog-detail'))->name('blog-detail');
Route::get('add-property', fn() => view('screens.add-property'))->name('add-property');
Route::get('explore-property', fn() => view('screens.explore-property'))->name('explore-property');
Route::get('favorite-property', fn() => view('screens.favorite-property'))->name('favorite-property');
Route::get('error', fn() => view('screens.error'))->name('error');
Route::get('comingsoon', fn() => view('screens.comingsoon'))->name('comingsoon');
Route::get('lock-screen', fn() => view('screens.lock-screen'))->name('lock-screen');
Route::get('maintenance', fn() => view('screens.maintenance'))->name('maintenance');
Route::get('pricing', fn() => view('screens.pricing'))->name('pricing');
Route::get('faqs', fn() => view('screens.faqs'))->name('faqs');
Route::get('profile', fn() => view('screens.profile'))->name('profile');
Route::get('profile-setting', fn() => view('screens.profile-setting'))->name('profile-setting');
Route::get('privacy', fn() => view('screens.privacy'))->name('privacy');
Route::get('property-detail', fn() => view('screens.property-detail'))->name('property-detail');
Route::get('reset-password', fn() => view('screens.reset-password'))->name('reset-password');
Route::get('review', fn() => view('screens.review'))->name('review');
Route::get('signup', fn() => view('screens.signup'))->name('signup');
Route::get('signup-success', fn() => view('screens.signup-success'))->name('signup-success');
Route::get('starter', fn() => view('screens.starter'))->name('starter');
Route::get('terms', fn() => view('screens.terms'))->name('terms');
Route::get('thankyou', fn() => view('screens.thankyou'))->name('thankyou');
