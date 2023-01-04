<?php

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\ {
    LibrarianController,
};

Route::controller(LibrarianController::class)->group(function () {
// Librarians
    Route::get('/bibliotekari', 'index')->name('all-librarian');
    Route::get('/bibliotekar/{user:username}', 'show')->name('show-librarian');

// Prevent making new librarians if auth user -> librarian
    Route::middleware('librarian-not-librarian')->group(function () {
        Route::get('/novi-bibliotekar', 'create')->name('new-librarian');
        Route::post('/novi-bibliotekar', 'store')->name('store-librarian');
    });

    Route::get('/izmijeni-profil-bibliotekara/{user:username}', 'edit')
        ->name('edit-librarian');
    Route::put('/izmijeni-profil-bibliotekara/{id}', 'update')
        ->name('update-librarian');

// Additional features

// Delete ownself
    Route::delete('/izbrisi-bibliotekara/{id}', 'destroy')
        ->name('destroy-librarian');

// For multiple librarian delete
    Route::delete('izbrisi-sve/bibliotekare', 'deleteMultiple')
        ->name('delete-all-librarians');

// Middleware protection
    Route::middleware('user-delete')->group(function () {
// Protection for deleting a certain librarian through URI
        Route::get('/bibliotekari/{id}', function ($id) {
        });
        Route::post('/bibliotekari/{id}', 'destroy')
            ->name('librarians.destroy');
    });

    Route::post('/resetuj-lozinku/{user}', 'resetPassword')
        ->name('resetPassword');
    Route::post('/crop/bibliotekar', 'crop')->name('librarian.crop');
});

?>
