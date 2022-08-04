<?php 

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\Settings\ {
    GenreController
};

Route::controller(GenreController::class)->group(function() {

Route::get('/podesavanja/novi-zanr', [GenreController::class, 'index'])->name('new-genre');
Route::post('/podesavanja/kreiranje-novog-zanra', [GenreController::class, 'store'])->name('store-genre');
Route::delete('/podesavanja/brisanje-zanra/{id}', [GenreController::class, 'destroy'])->name('destroy-genre');
Route::get('/podesavanja/izmijeni-zanr/{id}', [GenreController::class, 'edit'])->name('edit-genre');
Route::put('/podesavanja/izmijeni-zanr/{id}', [GenreController::class, 'update'])->name('update-genre');

});

?>
