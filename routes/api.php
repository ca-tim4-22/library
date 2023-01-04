<?php

use App\Http\Controllers\API\ {
    AuthorAPIController,
    BindingAPIController,
    BookAPIController,
    CategoryAPIController,
    FormatAPIController,
    GenreAPIController,
    GlobalVariableAPIController,
    LanguageAPIController,
    LetterAPIController,
    PublisherAPIController,
    UserAPIController
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/korisnik', function (Request $request) {
    return $request->user();
});

// Version 1.0
Route::group(['prefix' => 'v1'], function () {
    Route::controller(UserAPIController::class)->group(function () {
// Users
        Route::get('/korisnici', 'users');

// Students
        Route::get('/ucenici-svi', 'students');
        Route::get('/ucenici', 'studentsMale');
        Route::get('/ucenice', 'studentsFemale');

// Librarians
        Route::get('/bibliotekari-svi', 'librarians');
        Route::get('/bibliotekari', 'librariansMale');
        Route::get('/bibliotekarke', 'librariansFemale');

// Administrators
        Route::get('/administratori-svi', 'administrators');
        Route::get('/administratori/{parameter}', 'sortAdministrators');

// User types
        Route::get('/tipovi-korisnika', 'userTypes');
        Route::get('/tipovi-korisnika-broj', 'userTypesCount');

// User sorting
        Route::get('/bibliotekari/{parameter}', 'sortLibrarians');
        Route::get('/ucenici/{parameter}', 'sortStudents');
        Route::get('/administratori/{parameter}', 'sortAdministrators');
    });

    Route::controller(BookAPIController::class)->group(function () {
// Books
        Route::get('/knjige', 'books');
        Route::get('/knjiga/{id}', 'showBook')->name('show-book-api');
        Route::post('/nova-knjiga', 'storeBook');
        Route::put('/izmijeni-knjigu/{id}', 'updateBook');
        Route::delete('/izbrisi-knjigu/{id}', 'destroyBook');
        Route::get('/trazi-knjigu/{title}', 'searchBook');
    });

    Route::controller(CategoryAPIController::class)->group(function () {
// Categories
        Route::get('/kategorije', 'categories');
        Route::get('/kategorija/{id}', 'showCategory')
            ->name('show-category-api');
        Route::post('/nova-kategorija', 'storeCategory');
        Route::put('/izmijeni-kategoriju/{id}', 'updateCategory');
        Route::delete('/izbrisi-kategoriju/{id}', 'destroyCategory');
        Route::get('/trazi-kategoriju/{name}', 'searchCategory');
    });

    Route::controller(GenreAPIController::class)->group(function () {
// Genres
        Route::get('/zanrovi', 'genres');
        Route::get('/zanr/{id}', 'showGenre')->name('show-genre-api');
        Route::post('/novi-zanr', 'storeGenre');
        Route::put('/izmijeni-zanr/{id}', 'updateGenre');
        Route::delete('/izbrisi-zanr/{id}', 'destroyGenre');
        Route::get('/trazi-zanr/{name}', 'searchGenre');
    });

    Route::controller(PublisherAPIController::class)->group(function () {
// Publishers
        Route::get('/izdavaci', 'publishers');
        Route::get('/izdavac/{id}', 'showPublisher')
            ->name('show-publisher-api');
        Route::post('/novi-izdavac', 'storePublisher');
        Route::put('/izmijeni-izdavaca/{id}', 'updatePublisher');
        Route::delete('/izbrisi-izdavaca/{id}', 'destroyPublisher');
        Route::get('/trazi-izdavaca/{name}', 'searchPublisher');
    });

    Route::controller(BindingAPIController::class)->group(function () {
// Bindings
        Route::get('/povezi', 'bindings');
        Route::get('/povez/{id}', 'showBinding')->name('show-binding-api');
        Route::post('/novi-povez', 'storeBinding');
        Route::put('/izmijeni-povez/{id}', 'updateBinding');
        Route::delete('/izbrisi-povez/{id}', 'destroyBinding');
        Route::get('/trazi-povez/{name}', 'searchBinding');
    });

    Route::controller(FormatAPIController::class)->group(function () {
// Formats
        Route::get('/formati', 'formats');
        Route::get('/format/{id}', 'showFormat')->name('show-format-api');
        Route::post('/novi-format', 'storeFormat');
        Route::put('/izmijeni-format/{id}', 'updateFormat');
        Route::delete('/izbrisi-format/{id}', 'destroyFormat');
        Route::get('/trazi-format/{name}', 'searchFormat');
    });

    Route::controller(LetterAPIController::class)->group(function () {
// Letters
        Route::get('/pisma', 'letters');
        Route::get('/pismo/{id}', 'showLetter')->name('show-letter-api');
        Route::post('/novo-pismo', 'storeLetter');
        Route::put('/izmijeni-pismo/{id}', 'updateLetter');
        Route::delete('/izbrisi-pismo/{id}', 'destroyLetter');
        Route::get('/trazi-pismo/{name}', 'searchLetter');
    });

    Route::controller(LanguageAPIController::class)->group(function () {
// Languages
        Route::get('/jezici', 'languages');
        Route::get('/jezik/{id}', 'showLanguage')->name('show-language-api');
        Route::post('/novi-jezik', 'storeLanguage');
        Route::put('/izmijeni-jezik/{id}', 'updateLanguage');
        Route::delete('/izbrisi-jezik/{id}', 'destroyLanguage');
        Route::get('/trazi-jezik/{name}', 'searchLanguage');
    });

    Route::controller(AuthorAPIController::class)->group(function () {
// Authors
        Route::get('/autori', 'authors');
        Route::get('/autor/{id}', 'showAuthor')->name('show-author-api');
        Route::post('/novi-autor', 'storeAuthor');
        Route::put('/izmijeni-autora/{id}', 'updateAuthor');
        Route::delete('/izbrisi-autora/{id}', 'destroyAuthor');
        Route::get('/trazi-autora/{NameSurname}', 'searchAuthor');
        Route::get('/autori-broj', 'authorsCount');
    });

    Route::controller(GlobalVariableAPIController::class)->group(function () {
// Global Variables
        Route::get('/globalne-varijable', 'globalVariables');
        Route::get('/globalna-varijabla/{id}', 'showGlobalVariable')
            ->name('show-global-variable-api');
        Route::post('/nova-globalna-varijabla', 'storeGlobalVariable');
        Route::put('/izmijeni-globalnu-varijablu/{id}', 'updateGlobalVariable');
        Route::delete('/izbrisi-globalnu-varijablu/{id}',
            'destroyGlobalVariable');
        Route::get('/trazi-globalnu-varijablu/{variable}',
            'searchGlobalVariable');
        Route::get('/globalne-varijable-broj', 'globalVariablesCount');
    });
});



