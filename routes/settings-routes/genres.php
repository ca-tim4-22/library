<?php

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\Settings\ {
    GenreController
};

Route::controller(GenreController::class)->group(function () {
    Route::get('/podesavanja/novi-zanr', 'index')->name('new-genre');
    Route::post('/podesavanja/kreiranje-novog-zanra', 'store')
        ->name('store-genre');
    Route::delete('/podesavanja/brisanje-zanra/{id}', 'destroy')
        ->name('destroy-genre');
    Route::get('/podesavanja/izmijeni-zanr/{genre:name}', 'edit')
        ->name('edit-genre');
    Route::put('/podesavanja/izmijeni-zanr/{id}', 'update')
        ->name('update-genre');

// Additional features

// For multiple author delete
    Route::delete('izbrisi-sve/zanrove', 'deleteMultiple')
        ->name('delete-all-genres');

// Middleware protection
    Route::middleware('user-delete')->group(function () {
        // Protection for deleting a certain genre through URI
        Route::get('/podesavanja/zanrovi/{id}', function ($id) {
        });
        Route::post('/podesavanja/zanrovi/{id}', 'destroy')
            ->name('genres.destroy');
    });
});

?>
