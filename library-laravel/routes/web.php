<?php

use App\Http\Controllers\Auth\ {
    LoginController,
};

use Illuminate\Support\Facades\ {
    Artisan,
    Redirect,
    Route,
};

use App\Http\Controllers\ {
    DashboardController,
    HomeController,
    LibrarianController,
    SettingController,
    StudentController,
};

// Make sure path '/' goes to '/pocetna'
Route::get('/', function () {
    return to_route('redirect');
});
Route::get('/pocetna', function () {
    return view('welcome');
})->name('redirect');

Route::group(['middleware' => 'auth'], function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::controller(LibrarianController::class)->group(function() {
// Librarians
Route::get('/bibliotekari', [LibrarianController::class, 'index'])->name('all-librarian');
Route::get('/bibliotekar/{id}', [LibrarianController::class, 'show'])->name('show-librarian');
Route::get('/novi-bibliotekar', [LibrarianController::class, 'create'])->name('new-librarian');
Route::post('/novi-bibliotekar', [LibrarianController::class, 'store'])->name('store-librarian');
Route::get('/izmijeni/profil-bibliotekara/{id}', [LibrarianController::class, 'edit'])->name('edit-librarian');
Route::put('/izmijeni-profil-bibliotekara/{id}', [LibrarianController::class, 'update'])->name('update-librarian');
Route::delete('/izbrisi-bibliotekara/{id}', [LibrarianController::class, 'destroy'])->name('destroy-librarian');
});

Route::controller(StudentController::class)->group(function() {
// Students
Route::get('/ucenici', [StudentController::class, 'index'])->name('all-student');
Route::get('/ucenik/{id}', [StudentController::class, 'show'])->name('show-student');
Route::get('/novi-ucenik', [StudentController::class, 'create'])->name('new-student');
Route::post('/novi-ucenik', [StudentController::class, 'store'])->name('store-student');
Route::get('/izmijeni-profil-ucenika/{id}', [StudentController::class, 'edit'])->name('edit-student');
Route::put('/izmijeni-profil-ucenika/{id}', [StudentController::class, 'update'])->name('update-student');
Route::delete('/izbrisi-ucenika/{id}', [StudentController::class, 'destroy'])->name('destroy-student');
});

Route::controller(SettingController::class)->group(function() {
// Settings
Route::name('setting-')->prefix('podesavanja')->group(function() {
    // Plural
    Route::get('/polisa', [SettingController::class, 'policy'])->name('policy');
    Route::get('/kategorije', [SettingController::class, 'category'])->name('category');
    Route::get('/zanrovi', [SettingController::class, 'genre'])->name('genre');
    // Singular
    Route::get('/izdavac', [SettingController::class, 'publisher'])->name('publisher');
    Route::get('/povez', [SettingController::class, 'binding'])->name('binding');
    Route::get('/format', [SettingController::class, 'format'])->name('format');
    Route::get('/pismo', [SettingController::class, 'letter'])->name('letter');
});

});
});









// Laravel Authentication route
Route::auth(['verify' => 'true']);

// Logout route
Route::get('/logout', [LoginController::class, 'logout']);

// Server down route
Route::get('/shutdown', function(){
    Artisan::call('down', ['--render' => "maintenance"]);
    return back();
});

