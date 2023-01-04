<?php

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\ {
    AuthorController
};

Route::controller(AuthorController::class)->group(function () {
// Authors
    Route::get('/autori', 'index')->name('all-author');
    Route::get('/autor/{author:NameSurname}', 'show')->name('show-author');
    Route::get('/novi-autor', 'create')->name('new-author');
    Route::post('/novi-autor', 'store')->name('store-author');
    Route::get('/izmijeni-autora/{author:NameSurname}', 'edit')
        ->name('edit-author');
    Route::put('/izmijeni-autora/{id}', 'update')->name('update-author');
    Route::delete('/izbrisi-autora/{id}', 'destroy')->name('destroy-author');

// Additional features

// For multiple author delete
    Route::delete('izbrisi-sve/autore', 'deleteMultiple')
        ->name('delete-all-authors');

// Middleware protection
    Route::middleware('user-delete')->group(function () {
// Protection for deleting a certain author through URI
        Route::get('/autori/{id}', function ($id) {
        });
        Route::post('/autori/{id}', 'destroy')->name('authors.destroy');
    });
});

?>
