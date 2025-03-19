<?php

use App\Http\Controllers\InitialController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\urlController;
use Illuminate\Support\Facades\Route;

Route::get('/default', function () {
    return view('welcome');
});


// ProfileController - handles avatar, password, email, 
// username updates.
Route::put('/profile/{user:username}/manage-avatar', [ProfileController::class, "uploadNewAvatarImage"])->middleware('mustBeLoggedIn');
Route::get('/profile/{user:username}/manage-avatar', [ProfileController::class, "loadManageAvatarPage"])->middleware('mustBeLoggedIn');
Route::put('/profile/{user:username}/update-password', [ProfileController::class, "updatePassword"])->middleware('mustBeLoggedIn');
Route::put('/profile/{user:username}/update-username', [ProfileController::class, "updateUsername"])->middleware('mustBeLoggedIn');
Route::put('/profile/{user:username}/update-email', [ProfileController::class, "updateEmail"])->middleware('mustBeLoggedIn');
Route::get('/profile/{user:username}', [ProfileController::class, "loadProfilePage"])->middleware('mustBeLoggedIn');

// PremiumController routes - handles subscribing, unsubscribing,
// loading the premium page.
Route::put('/unsubscribe', [PremiumController::class, "disableSubscription"])->middleware('mustBeLoggedIn');
Route::put('/subscribe', [PremiumController::class, "enableSubscription"])->middleware('mustBeLoggedIn');
Route::get('/premium', [PremiumController::class, "loadPremiumWelcomePage"])->middleware('mustBeLoggedIn');


// urlController routes - handles redirection, 
// shorten API link in homepage, loads homepage of the user.
Route::get('/homepage/search/{term}',[urlController::class, "search"]);
Route::get('/g/{guestshortURL}', [urlController::class, "redirectGuestShortURL"]);
Route::post('/shortenguest', [urlController::class, "shortenGuestURL"])->middleware('guest');
Route::get('/a/{shortURL}', [urlController::class, "redirectShortURL"]);
Route::post('/shorten', [urlController::class, "shortenURL"])->middleware('mustBeLoggedIn');
Route::get('/homepage', [urlController::class, "showHomePage"])->middleware('mustBeLoggedIn');


// InitialController routes - handles register, landing page, login, logout
Route::post('/logout', [InitialController::class, "logout"])->name('logout');
Route::post('/login', [InitialController::class, "login"])->middleware('guest');
Route::post('/register', [InitialController::class, "register"])->middleware('guest');
Route::get('/login', [
    InitialController::class,
    "showLogin"
])->name('login')->middleware('guest');
// used with middleware('auth') | afterwards add the alias to bootstrap/app.php
Route::get('/', [InitialController::class, "showLandingPage"]);
Route::get('/4044', function () {
    return view('404')->with('failure', 'Link does not exist.'); // or return view('errors.404');
})->name('4044');


// Fallback route to handle invalid routes and 404 GET REQUESTs.
Route::fallback(function () {
    return view('404'); // or return view('errors.404');
})->name('fallback');
// Admin only routes (uses Gates, refer to AppServiceProvier.php)
Route::get('/siteadmin', function () {
    if (Gate::allows('visitAdminPages')) {
        return view('adminpanel');
    }
    return back()->with('failure', 'You are not authorized.');
})->middleware('mustBeLoggedIn')->name('siteadmin');

// 
// Things to do : 
// - login - DONE
// - signup / register - DONE
// - shorten a url - DONE
// - shortened urls list in homepage - DONE
// - add subscription to premium (without stripe) - DONE
// - profile management page (avatar, update password, 
//   update username, update email, email confirmation 2FA ) - DONE
// - add policies and gates/admin stuff - DONE
// - add search - DONE
// - add livewire - DONE
// - add email with Mail facade / jobs using dispatch - DONE
// - finish admin panel / along with links to delete urls  - 
// - add subscription to premium (with stripe)
// - add cron job to delete urls after expiry date - DONE
// - guest url shortening wihtout logging in in landing page - DONE
// - optional extra features (paid) : custom alias, number of clicks, 
//   expiration date, permissions on links 
//   (auth stuff, groups) - DONE
// - optimizations (caching / loading (prefetching) 
//   / database stuff) - caching DONE
// - google analytics and adsense
// - redis - LATER
// - deployment - DONE