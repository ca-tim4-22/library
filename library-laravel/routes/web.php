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
    UserController,
    BookController,
};

use App\Http\Controllers\Settings\BindingController;
use App\Http\Controllers\Settings\CategoryController;
use App\Http\Controllers\Settings\FormatController;
use App\Http\Controllers\Settings\GenreController;
use App\Http\Controllers\Settings\LetterController;
use App\Http\Controllers\Settings\PolicyController;
use App\Http\Controllers\Settings\PublisherController;

// Make sure path '/' goes to '/pocetna'
Route::get('/', function () {
    return to_route('redirect');
});
Route::get('/pocetna', function () {
    return view('welcome');
})->name('redirect');

Route::group(['middleware' => 'auth'], function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard-aktivnost', [DashboardController::class, 'index_activity'])->name('dashboard-activity');

Route::controller(LibrarianController::class)->group(function() {
// Librarians
Route::get('/bibliotekari', [LibrarianController::class, 'index'])->name('all-librarian');
Route::get('/bibliotekar/{id}', [LibrarianController::class, 'show'])->name('show-librarian');
Route::get('/novi-bibliotekar', [LibrarianController::class, 'create'])->name('new-librarian');
Route::post('/novi-bibliotekar', [LibrarianController::class, 'store'])->name('store-librarian');
Route::get('/izmijeni/profil-bibliotekara/{id}', [LibrarianController::class, 'edit'])->name('edit-librarian');
Route::put('/izmijeni-profil-bibliotekara/{id}', [LibrarianController::class, 'update'])->name('update-librarian');
Route::delete('/izbrisi-bibliotekara/{id}', [LibrarianController::class, 'destroy'])->name('destroy-librarian');
Route::post('/resetuj-lozinku/{user}', [UserController::class, 'resetPassword'])->name('resetPassword');
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
// Settings - index pages
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

Route::controller(CategoryController::class)->group(function() {
Route::get('/podesavanja/nova-kategorija', [CategoryController::class, 'index'])->name('new-category');
Route::post('/podesavanja/kreiranje-nove-kategorije', [CategoryController::class, 'store'])->name('store-category');
Route::delete('/podesavanja/brisanje-kategorije/{id}', [CategoryController::class, 'destroy'])->name('destroy-category');
Route::get('/podesavanja/izmijeni-kategoriju/{id}', [CategoryController::class, 'edit'])->name('edit-category');
Route::put('/podesavanja/izmijeni-kategoriju/{id}', [CategoryController::class, 'update'])->name('update-category');
});

});

Route::controller(GenreController::class)->group(function() {
Route::get('/podesavanja/novi-zanr', [GenreController::class, 'index'])->name('new-genre');
Route::post('/podesavanja/kreiranje-novog-zanra', [GenreController::class, 'store'])->name('store-genre');
Route::delete('/podesavanja/brisanje-zanra/{id}', [GenreController::class, 'destroy'])->name('destroy-genre');
Route::get('/podesavanja/izmijeni-zanr/{id}', [GenreController::class, 'edit'])->name('edit-genre');
Route::put('/podesavanja/izmijeni-zanr/{id}', [GenreController::class, 'update'])->name('update-genre');
});

Route::controller(PolicyController::class)->group(function() {
Route::put('/podesavanja/izmijeni-polisu/{id}', [PolicyController::class, 'update'])->name('update-policy');
});

Route::controller(LetterController::class)->group(function() {
Route::get('/podesavanja/novo-pismo', [LetterController::class, 'index'])->name('new-letter');
Route::post('/podesavanja/kreiranje-novog-pisma', [LetterController::class, 'store'])->name('store-letter');
Route::delete('/podesavanja/brisanje-pisma/{id}', [LetterController::class, 'destroy'])->name('destroy-letter');
Route::get('/podesavanja/izmijeni-pismo/{id}', [LetterController::class, 'edit'])->name('edit-letter');
Route::put('/podesavanja/izmijeni-pismo/{id}', [LetterController::class, 'update'])->name('update-letter');
});

Route::controller(FormatController::class)->group(function() {
Route::get('/podesavanja/novi-format', [FormatController::class, 'index'])->name('new-format');
Route::post('/podesavanja/kreiranje-novog-formata', [FormatController::class, 'store'])->name('store-format');
Route::delete('/podesavanja/brisanje-formata/{id}', [FormatController::class, 'destroy'])->name('destroy-format');
Route::get('/podesavanja/izmijeni-format/{id}', [FormatController::class, 'edit'])->name('edit-format');
Route::put('/podesavanja/izmijeni-format/{id}', [FormatController::class, 'update'])->name('update-format');
});

Route::controller(PublisherController::class)->group(function() {
Route::get('/podesavanja/novi-izdavac', [PublisherController::class, 'index'])->name('new-publisher');
Route::post('/podesavanja/kreiranje-novog-izdavaca', [PublisherController::class, 'store'])->name('store-publisher');
Route::delete('/podesavanja/brisanje-izdavaca/{id}', [PublisherController::class, 'destroy'])->name('destroy-publisher');
Route::get('/podesavanja/izmijeni-izdavaca/{id}', [PublisherController::class, 'edit'])->name('edit-publisher');
Route::put('/podesavanja/izmijeni-izdavaca/{id}', [PublisherController::class, 'update'])->name('update-publisher');
});

Route::controller(BindingController::class)->group(function() {
Route::get('/podesavanja/novi-povez', [BindingController::class, 'index'])->name('new-binding');
Route::post('/podesavanja/kreiranje-novog-poveza', [BindingController::class, 'store'])->name('store-binding');
Route::delete('/podesavanja/brisanje-poveza/{id}', [BindingController::class, 'destroy'])->name('destroy-binding');
Route::get('/podesavanja/izmijeni-povez/{id}', [BindingController::class, 'edit'])->name('edit-binding');
Route::put('/podesavanja/izmijeni-povez/{id}', [BindingController::class, 'update'])->name('update-binding');
});
    Route::controller(BookController::class)->group(function(){
// Books
        Route::get('/knjige', [BookController::class, 'index'])->name('all-books');
        Route::get('/knjiga/{id}', [BookController::class, 'show'])->name('show-book');
        Route::get('/nova-knjiga', [BookController::class, 'create'])->name('new-book');

        Route::post('/nova-knjiga', [BookController::class, 'store'])->name('store-book');
        Route::get('/izmijeni-knjigu/{id}', [BookController::class, 'edit'])->name('edit-book');
        Route::put('/izmijeni-knjigu/{id}', [BookController::class, 'update'])->name('update-book');
        Route::delete('/izbrisi-knjigu/{id}', [BookController::class, 'destroy'])->name('destroy-book');
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

