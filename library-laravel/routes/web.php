<?php

use Illuminate\Support\Facades\Route;

// Make sure path '/' goes to '/pocetna'
Route::get('/', function () {
    return to_route('redirect');
});
Route::get('/pocetna', function () {
    return view('welcome');
})->name('redirect');

// Laravel Authentication route
Route::auth(['verify' => 'true']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
