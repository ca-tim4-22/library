<?php

use Illuminate\Support\Facades\ {
    Route,
};

use App\Http\Controllers\Settings\ {
    FormatController
};

Route::controller(FormatController::class)->group(function() {
Route::get('/podesavanja/novi-format', [FormatController::class, 'index'])->name('new-format');
Route::post('/podesavanja/kreiranje-novog-formata', [FormatController::class, 'store'])->name('store-format');
Route::delete('/podesavanja/brisanje-formata/{id}', [FormatController::class, 'destroy'])->name('destroy-format');
Route::get('/podesavanja/izmijeni-format/{id}', [FormatController::class, 'edit'])->name('edit-format');
Route::put('/podesavanja/izmijeni-format/{id}', [FormatController::class, 'update'])->name('update-format');
Route::post('/podesavanja/format',[FormatController::class, 'search'])->name('search-format');
});

?>
