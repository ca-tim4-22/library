<?php

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\Settings\ {
    BindingController
};

Route::controller(BindingController::class)->group(function () {
    Route::get('/podesavanja/novi-povez', 'index')->name('new-binding');
    Route::post('/podesavanja/kreiranje-novog-poveza', 'store')
        ->name('store-binding');
    Route::delete('/podesavanja/brisanje-poveza/{id}', 'destroy')
        ->name('destroy-binding');
    Route::get('/podesavanja/izmijeni-povez/{binding:name}', 'edit')
        ->name('edit-binding');
    Route::put('/podesavanja/izmijeni-povez/{id}', 'update')
        ->name('update-binding');

// Additional features

// For multiple author delete
    Route::delete('izbrisi-sve/poveze', 'deleteMultiple')
        ->name('delete-all-bindings');

// Middleware protection
    Route::middleware('user-delete')->group(function () {
        // Protection for deleting a certain publisher through URI
        Route::get('/podesavanja/povezi/{id}', function ($id) {
        });
        Route::post('/podesavanja/povezi/{id}', 'destroy')
            ->name('bindings.destroy');
    });
});

?>
