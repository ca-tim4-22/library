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
Route::get('/bibliotekari', [LibrarianController::class, 'index'])->name('all-librarian');
// Route::get('/bibliotekar/{id}', [LibrarianController::class, 'show'])->name('show-librarian');
Route::resource('/lib', 'App\Http\Controllers\LibrarianController');
Route::get('/novi-bibliotekar', [LibrarianController::class, 'create'])->name('new-librarian');
Route::post('/novi-bibliotekar', [LibrarianController::class, 'store'])->name('store-librarian');
Route::delete('/izbrisi-bibliotekara/{id}', [LibrarianController::class, 'destroy'])->name('destroy-librarian');


// Laravel Authentication route
Route::auth(['verify' => 'true']);

// Logout route
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
