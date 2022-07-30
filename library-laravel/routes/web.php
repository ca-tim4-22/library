<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibrarianController;
use Illuminate\Support\Facades\Route;

// Make sure path '/' goes to '/pocetna'
Route::get('/', function () {
    return to_route('redirect');
});
Route::get('/pocetna', function () {
    return view('welcome');
})->name('redirect');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Librarian
Route::get('/novi-bibliotekar', [LibrarianController::class, 'index'])->name('new-librarian');
Route::post('/novi-bibliotekar', [LibrarianController::class, 'store'])->name('store-librarian');

// Laravel Authentication route
Route::auth(['verify' => 'true']);

// Logout route
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
