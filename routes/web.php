<?php

use App\Http\Controllers\InitialController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\urlController;
use Illuminate\Support\Facades\Route;

Route::get('/default', function () {
    return view('welcome');
});


Route::post('/unsubscribe', [PremiumController::class, "disableSubscription"])->middleware('mustBeLoggedIn');
Route::post('/subscribe', [PremiumController::class, "enableSubscription"])->middleware('mustBeLoggedIn');
Route::get('/premium', [PremiumController::class, "loadPremiumWelcomePage"])->middleware('mustBeLoggedIn');


// urlController routes - handles redirection, 
// shorten API link in homepage, loads homepage of the user.
Route::get('/g/{guestshortURL}',[urlController::class,"redirectGuestShortURL"]);
Route::post('/shortenguest', [urlController::class, "shortenGuestURL"])->middleware('guest');
Route::get('/a/{shortURL}', [urlController::class, "redirectShortURL"]);
Route::post('/shorten', [urlController::class, "shortenURL"])->middleware('mustBeLoggedIn');
Route::get('/homepage', [urlController::class, "showHomePage"])->middleware('mustBeLoggedIn');


// InitialController routes - handles register, landing page, login, logout
Route::post('/logout', [InitialController::class, "logout"]);
Route::post('/login', [InitialController::class, "login"])->middleware('guest');
Route::post('/register', [InitialController::class, "register"])->middleware('guest');
Route::get('/login', [
    InitialController::class,
    "showLogin"
])->name('login')->middleware('guest'); 
// used with middleware('auth') | afterwards add the alias to bootstrap/app.php
Route::get('/', [InitialController::class, "showLandingPage"]);

// Fallback route to handle invalid routes and 404 GET REQUESTs.
Route::fallback(function () {
    return view('404')->with('failure', 'Link does not exist.'); // or return view('errors.404');
});
// Things to do : 
// - login - DONE
// - signup / register - DONE
// - shorten a url - DONE
// - shortened urls list in homepage - DONE
// - add subscription to premium (without stripe) - DONE
// - add subscription to premium (with stripe)
// - guest url shortening wihtout logging in in landing page - DONE
// - optional extra features (paid) : custom alias, number of clicks, 
//   expiration date, permissions on links 
//   (auth stuff, groups) - DONE
// - optimizations (caching / loading (prefetching) 
//   / database stuff)
// - google analytics and adsense
// - redis
// - deployment