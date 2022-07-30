<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Make sure path '/' goes to '/pocetna'
Route::get('/', function () {
    return to_route('redirect');
});
Route::get('/pocetna', function () {
    return view('welcome');
})->name('redirect');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Laravel Authentication route
Route::auth(['verify' => 'true']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
